import pandas as pd
import matplotlib.pyplot as plt

def plot_bivariate_and_multivariate(filename):
    # Read data from file
    columns = ["Sex", "Length", "Diameter", "Height", "Whole weight", "Shucked weight", "Viscera weight", "Shell weight", "Rings"]
    data = pd.read_csv(filename, names=columns)
    
    # Bivariate plot for Length and Height
    plt.scatter(data['Length'], data['Height'])
    plt.xlabel('Length')
    plt.ylabel('Height')
    plt.title('Bivariate Plot: Length vs Height')
    plt.show()

    # Multivariate plot
    numeric_data = data.drop("Sex", axis=1)  # Exclude 'Sex' column
    corr = numeric_data.corr()
    plt.figure(figsize=(8, 6))
    plt.title('Multivariate Plot')
    plt.imshow(corr, cmap='coolwarm', interpolation='nearest')
    plt.colorbar()
    plt.xticks(range(len(corr)), corr.columns, rotation=45)
    plt.yticks(range(len(corr)), corr.columns)
    plt.show()

# Call the function with your data file
plot_bivariate_and_multivariate("abalone/abalone.data")
