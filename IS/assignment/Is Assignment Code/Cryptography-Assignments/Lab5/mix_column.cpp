#include <iostream>
#include <vector>

using namespace std;

unsigned char gmul(unsigned char a, unsigned char b) {
    unsigned char p = 0;
    unsigned char counter;
    unsigned char hi_bit_set;
    for(counter = 0; counter < 8; counter++) {
        if((b & 1) == 1) 
            p ^= a;
        hi_bit_set = (a & 0x80);
        a <<= 1;
        if(hi_bit_set == 0x80) 
            a ^= 0x1b;		
        b >>= 1;
    }
    return p;
}

void mix_columns(vector<vector<unsigned char>>& s) {
    vector<unsigned char> sp(4);
    for(int c=0;c<4;c++) {
        sp[0] = gmul(0x02,s[0][c]) ^ gmul(0x03,s[1][c]) ^ s[2][c] ^ s[3][c];
        sp[1] = s[0][c] ^ gmul(0x02,s[1][c]) ^ gmul(0x03,s[2][c]) ^ s[3][c];
        sp[2] = s[0][c] ^ s[1][c] ^ gmul(0x02,s[2][c]) ^ gmul(0x03,s[3][c]);
        sp[3] = gmul(0x03,s[0][c]) ^ s[1][c] ^ s[2][c] ^ gmul(0x02,s[3][c]);
        for(int i=0;i<4;i++) 
            s[i][c] = sp[i];
    }
}

int main() {
    vector<vector<unsigned char>> state_matrix = {{0x47, 0x60, 0x42, 0xD2}, {0x79, 0x48, 0x53, 0xB2}, {0xE0, 0xEB, 0x20, 0xB4}, {0x7D, 0xBC, 0x54, 0x19}};
    mix_columns(state_matrix);
    for(int i=0;i<4;i++) {
        for(int j=0;j<4;j++) {
            printf("%02X ", state_matrix[i][j]);
        }
        printf("\n");
    }
    return 0;
}