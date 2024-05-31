from Crypto.Cipher import AES
from Crypto.Util.Padding import pad, unpad
from Crypto.Random import get_random_bytes
import binascii

# Function to convert matrix to hexadecimal
def matrix_to_hex(matrix):
    hex_matrix = []
    for row in matrix:
        hex_row = []
        for char in row:
            hex_row.append(hex(ord(char))[2:].zfill(2))
        hex_matrix.append(hex_row)
    return hex_matrix

# Function to convert hexadecimal string to matrix
def hex_to_matrix(hex_string):
    matrix = []
    for i in range(0, len(hex_string), 2):
        matrix.append([hex_string[i:i+2]])
    return matrix

# Function to perform XOR operation between two matrices
def xor_matrices(matrix1, matrix2):
    result_matrix = []
    for i in range(len(matrix1)):
        row = []
        for j in range(len(matrix1[i])):
            row.append(hex(int(matrix1[i][j], 16) ^ int(matrix2[i][j], 16))[2:].zfill(2))
        result_matrix.append(row)
    return result_matrix

# AES Encryption
def aes_encrypt(plaintext, key, iv):
    cipher = AES.new(key, AES.MODE_CBC, iv)
    ciphertext_bytes = cipher.encrypt(pad(plaintext.encode(), AES.block_size))
    return binascii.hexlify(ciphertext_bytes).decode()

# AES Decryption
def aes_decrypt(ciphertext, key, iv):
    cipher = AES.new(key, AES.MODE_CBC, iv)
    plaintext_bytes = cipher.decrypt(binascii.unhexlify(ciphertext))
    return unpad(plaintext_bytes, AES.block_size).decode()

# Convert plaintext to matrix
plaintext = "ISLAMABAD IS THE CAPITAL OF PAKISTAN."
plaintext_matrix = [
    ['I', 'S', 'L', 'A'],
    ['M', 'A', 'B', 'A'],
    ['D', 'I', 'S', 'T'],
    ['H', 'E', 'C', 'A']
]

# Convert matrix to hexadecimal
plaintext_hex_matrix = matrix_to_hex(plaintext_matrix)

# Generate Initialization Vector (IV)
iv_matrix = [
    ['I', 'V', 'I', 'V'],
    ['I', 'V', 'I', 'V'],
    ['I', 'V', 'I', 'V'],
    ['I', 'V', 'I', 'V']
]

# Perform XOR operation between plaintext matrix and IV matrix
xor_result = xor_matrices(plaintext_hex_matrix, matrix_to_hex(iv_matrix))

# Convert XOR result back to plaintext
xor_result_text = ''
for row in xor_result:
    for char in row:
        xor_result_text += chr(int(char, 16))

# AES Encryption
key = b'MY NAME IS FARJAD WA'
ciphertext_hex = aes_encrypt(xor_result_text, key, get_random_bytes(16))

# AES Decryption
plaintext_decrypted = aes_decrypt(ciphertext_hex, key, iv_matrix)

# Print results
print("Original Plaintext:", plaintext)
print("Encrypted Ciphertext (Hexadecimal):", ciphertext_hex)
print("Decrypted Plaintext:", plaintext_decrypted)