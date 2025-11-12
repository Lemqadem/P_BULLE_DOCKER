import mysql.connector
import os

# Récupérer les variables d'environnement
DB_HOST = os.getenv("DB_HOST", "localhost")
DB_USER = os.getenv("DB_USER", "user")
DB_PASSWORD = os.getenv("DB_PASSWORD", "userpassword")
DB_NAME = os.getenv("DB_NAME", "mydb")

# Connexion à la base de données
conn = mysql.connector.connect(
    host=DB_HOST,
    user=DB_USER,
    password=DB_PASSWORD,
    database=DB_NAME
)

cursor = conn.cursor()
cursor.execute("SHOW TABLES;")
tables = cursor.fetchall()
print("Tables existantes :", tables)

cursor.close()
conn.close()
