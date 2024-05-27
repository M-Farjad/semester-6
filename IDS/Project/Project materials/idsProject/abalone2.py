import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from sklearn.neighbors import KNeighborsClassifier
from sklearn.naive_bayes import GaussianNB
from sklearn.metrics import confusion_matrix, accuracy_score, precision_score, recall_score, f1_score
import matplotlib.pyplot as plt
import numpy as np
import itertools

def plot_confusion_matrix(cm, classes, normalize=False, title='Confusion matrix', cmap=plt.cm.Blues, ax=None):
    """
    This function prints and plots the confusion matrix.
    Normalization can be applied by setting `normalize=True`.
    """
    if normalize:
        cm = cm.astype('float') / cm.sum(axis=1)[:, np.newaxis]
        print("Normalized confusion matrix")
    else:
        print('Confusion matrix, without normalization')

    if ax is None:
        ax = plt.gca()

    im = ax.imshow(cm, interpolation='nearest', cmap=cmap)
    ax.set_title(title)
    plt.colorbar(im, ax=ax)
    tick_marks = np.arange(len(classes))
    ax.set_yticks(tick_marks)
    ax.set_yticklabels(classes, rotation=90)  # Rotate y labels 90 degrees
    ax.set_xticks(tick_marks)
    ax.set_xticklabels(classes, rotation=45)  # Rotate x labels 45 degrees

    fmt = '.2f' if normalize else 'd'
    thresh = cm.max() / 2.
    for i, j in itertools.product(range(cm.shape[0]), range(cm.shape[1])):
        ax.text(j, i, format(cm[i, j], fmt),
                 horizontalalignment="center",
                 color="white" if cm[i, j] > thresh else "black")

    ax.set_ylabel('True label')
    ax.set_xlabel('Predicted label')
    plt.tight_layout()

# Load the data
column_names = ['Sex', 'Length', 'Diameter', 'Height', 'Whole weight', 'Shucked weight', 'Viscera weight', 'Shell weight', 'Rings']
data = pd.read_csv('abalone.data', delimiter=',', names=column_names)

# Encode the 'Sex' column to numeric values
label_encoder = LabelEncoder()
data['Sex'] = label_encoder.fit_transform(data['Sex'])

# Split the data into features (X) and target variable (y)
X = data.drop('Sex', axis=1)
y = data['Sex']

# Split the data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# kNN classifier
knn = KNeighborsClassifier(n_neighbors=5)
knn.fit(X_train, y_train)
knn_pred = knn.predict(X_test)

# Naïve Bayes classifier
nb = GaussianNB()
nb.fit(X_train, y_train)
nb_pred = nb.predict(X_test)

# Calculate evaluation metrics for kNN
knn_cm = confusion_matrix(y_test, knn_pred)
knn_acc = accuracy_score(y_test, knn_pred)
knn_prec = precision_score(y_test, knn_pred, average='weighted')
knn_rec = recall_score(y_test, knn_pred, average='weighted')
knn_f1 = f1_score(y_test, knn_pred, average='weighted')

# Calculate evaluation metrics for Naïve Bayes
nb_cm = confusion_matrix(y_test, nb_pred)
nb_acc = accuracy_score(y_test, nb_pred)
nb_prec = precision_score(y_test, nb_pred, average='weighted')
nb_rec = recall_score(y_test, nb_pred, average='weighted')
nb_f1 = f1_score(y_test, nb_pred, average='weighted')

# Print evaluation metrics for kNN
print("kNN Confusion Matrix:")
print(knn_cm)
print("kNN Accuracy:", knn_acc)
print("kNN Precision:", knn_prec)
print("kNN Recall:", knn_rec)
print("kNN F1-score:", knn_f1)

# Print evaluation metrics for Naïve Bayes
print("\nNaïve Bayes Confusion Matrix:")
print(nb_cm)
print("Naïve Bayes Accuracy:", nb_acc)
print("Naïve Bayes Precision:", nb_prec)
print("Naïve Bayes Recall:", nb_rec)
print("Naïve Bayes F1-score:", nb_f1)

# Plot confusion matrices for both classifiers side by side
fig, axes = plt.subplots(1, 2, figsize=(16, 6))

# Plot confusion matrix for kNN
plot_confusion_matrix(knn_cm, classes=label_encoder.classes_,
                      title='Confusion Matrix - kNN', ax=axes[0])

# Plot confusion matrix for Naïve Bayes
plot_confusion_matrix(nb_cm, classes=label_encoder.classes_,
                      title='Confusion Matrix - Naïve Bayes', ax=axes[1])

plt.tight_layout()
plt.text(0.5, 0.5, '2021-SE-55', fontsize=50, color='gray', ha='center', va='center', alpha=0.5, transform=plt.gca().transAxes)
plt.show()
