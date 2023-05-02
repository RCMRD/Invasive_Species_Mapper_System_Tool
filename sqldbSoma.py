import sqlalchemy
import pandas as pd
engine = sqlalchemy.create_engine('mysql+pymysql://root:74#falls@localhost/SpatiaInvSpc')
df = pd.read_sql_table('fielddata', engine)
print(df.head())
