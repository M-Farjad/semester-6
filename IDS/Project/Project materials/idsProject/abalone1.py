import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt

# Load the data
column_names = ['Sex', 'Length', 'Diameter', 'Height', 'Whole weight', 'Shucked weight', 'Viscera weight', 'Shell weight', 'Rings']
df = pd.read_csv('abalone.data', delimiter=',', names=column_names)

# Set up the plotting parameters
sns.set(style="whitegrid")

# Select only numeric columns for outlier removal
numeric_columns = ['Length', 'Diameter', 'Height', 'Whole weight', 'Shucked weight', 'Viscera weight', 'Shell weight', 'Rings']
df_numeric = df[numeric_columns]

# Remove outliers based on interquartile range (IQR)
Q1 = df_numeric.quantile(0.25)
Q3 = df_numeric.quantile(0.75)
IQR = Q3 - Q1
df_no_outliers = df[~((df_numeric < (Q1 - 1.5 * IQR)) | (df_numeric > (Q3 + 1.5 * IQR))).any(axis=1)]

# Scatter Plot with different classes shown in different colors
plt.figure(figsize=(10, 6))
sns.scatterplot(x='Length', y='Diameter', hue='Sex', data=df_no_outliers, palette='Set1')
plt.title('Scatter Plot of Length vs. Diameter (Sex-wise) without Outliers')
plt.xlabel('Length')
plt.ylabel('Diameter')
plt.legend(title='Sex')
plt.text(0.5, 0.5, '2021-SE-55', fontsize=50, color='gray', ha='center', va='center', alpha=0.5, transform=plt.gca().transAxes)
plt.show()



# Multivariate Analysis
# Pair Plot without outliers
plt.figure(figsize=(12, 8))
sns.pairplot(df_no_outliers[['Length', 'Diameter', 'Height', 'Whole weight']])
plt.title('Pair Plot of Numerical Columns without Outliers')
plt.text(0.5, 0.5, '2021-SE-55', fontsize=50, color='gray', ha='center', va='center', alpha=0.5, transform=plt.gca().transAxes)
plt.show()


