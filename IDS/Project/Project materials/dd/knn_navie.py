import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from sklearn.neighbors import KNeighborsClassifier
from sklearn.naive_bayes import GaussianNB
from sklearn.metrics import confusion_matrix, classification_report, accuracy_score, precision_score, recall_score, f1_score

def prepare_data(filename):
    # Read data from file
    columns = ["Sex", "Length", "Diameter", "Height", "Whole weight", "Shucked weight", "Viscera weight", "Shell weight", "Rings"]
    data = pd.read_csv(filename, names=columns)
    
    # Encode categorical variable 'Sex'
    label_encoder = LabelEncoder()
    data['Sex'] = label_encoder.fit_transform(data['Sex'])
    
    # Split data into features and target
    X = data.drop("Rings", axis=1)
    y = data['Rings']
    
    # Split data into train and test sets
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    
    return X_train, X_test, y_train, y_test

def apply_knn(filename):
    # Prepare data
    X_train, X_test, y_train, y_test = prepare_data(filename)
    
    # Apply KNN
    knn = KNeighborsClassifier(n_neighbors=5)
    knn.fit(X_train, y_train)
    y_pred = knn.predict(X_test)
    
    # Evaluate
    evaluate_performance("K-Nearest Neighbors (KNN) Classifier", y_test, y_pred)

def apply_naive_bayes(filename):
    # Prepare data
    X_train, X_test, y_train, y_test = prepare_data(filename)
    
    # Apply Naive Bayes
    nb = GaussianNB()
    nb.fit(X_train, y_train)
    y_pred = nb.predict(X_test)
    
    # Evaluate
    evaluate_performance("Naive Bayes Classifier", y_test, y_pred)

def evaluate_performance(classifier, y_true, y_pred):
    # Calculate evaluation metrics
    accuracy = accuracy_score(y_true, y_pred)
    precision = precision_score(y_true, y_pred, average='weighted', zero_division=0)
    recall = recall_score(y_true, y_pred, average='weighted', zero_division=0)
    f1 = f1_score(y_true, y_pred, average='weighted', zero_division=0)
    
    # Confusion matrix
    cm = confusion_matrix(y_true, y_pred)
    
    # Print results
    print(classifier + ":")
    print("Confusion Matrix:\n", cm)
    print("Accuracy:", accuracy)
    print("Precision:", precision)
    print("Recall:", recall)
    print("F1-score:", f1)
    print("\nClassification Report:")
    print(classification_report(y_true, y_pred, zero_division=0))

# Call functions with your data file
apply_knn("abalone/abalone.data")
apply_naive_bayes("abalone/abalone.data")
