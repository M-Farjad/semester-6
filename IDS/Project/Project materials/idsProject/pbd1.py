import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt

# Define column names
column_names = ['Height', 'Length', 'Area', 'Eccen', 'P_Black', 'P_And', 'Mean_TR', 'Blackpix', 'Blackand', 'Wb_Trans', 'Class']

# Read data from CSV with specified column names
data = pd.read_csv('page-blocks.data.csv', names=column_names)

# Set up the plotting parameters
sns.set(style="whitegrid")

# Scatter Plot class-wise without outliers
plt.figure(figsize=(10, 6))
for class_value in data['Class'].unique():
    class_data = data[data['Class'] == class_value]
    # Remove outliers based on interquartile range (IQR) for each class
    numeric_data = class_data.select_dtypes(include=['int64', 'float64'])
    Q1 = numeric_data.quantile(0.25)
    Q3 = numeric_data.quantile(0.75)
    IQR = Q3 - Q1
    class_data_no_outliers = class_data[~((numeric_data < (Q1 - 1.5 * IQR)) | (numeric_data > (Q3 + 1.5 * IQR))).any(axis=1)]
    sns.scatterplot(x='Class', y='Height', data=class_data_no_outliers, label=class_value)

plt.title('Scatter Plot of Height vs. Class (Class-wise) without Outliers')
plt.xlabel('Class')
plt.ylabel('Height')
plt.legend(title='Class')
plt.text(0.5, 0.5, '2021-SE-55', fontsize=50, color='gray', ha='center', va='center', alpha=0.5, transform=plt.gca().transAxes)
plt.show()

# Multivariate Analysis
# Pair Plot without outliers
plt.figure(figsize=(12, 8))
sns.pairplot(data[['Height', 'Length', 'Area', 'Eccen', 'Class']])
plt.title('Pair Plot of Numerical Columns without Outliers')
plt.text(0.5, 0.5, '2021-SE-55', fontsize=50, color='gray', ha='center', va='center', alpha=0.5, transform=plt.gca().transAxes)
plt.show()
