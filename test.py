import pyspark
from pyspark.sql import SQLContext
from pyspark.sql.functions import col

sc = pyspark.SparkContext()
sqlContext = SQLContext(sc)

# ignore info print statements
sc.setLogLevel("WARN")


# df = sqlContext.read.option("header", "true").csv("originalDataset.csv")
df = sqlContext.read.csv("originalDataset.csv", inferSchema=True, header=True)

# Displays the content of the DataFrame to stdout
# df.show()
# df.printSchema()
# print(df.columns)

###############################################
#### What is India’s total Win/Loss/Tie percentage? ######
total_games_india_played = df.filter((col("Team 1") == "India") | (col("Team 2") == "India")).count()
india_win_rate = df.filter(((col("Team 1") == "India") | (col("Team 2") == "India")) & (col("Winner") == "India")).count()
india_lose_rate = df.filter(((col("Team 1") == "India") | (col("Team 2") == "India")) & (col("Winner") != "India")).count()
india_tie_rate = df.filter(((col("Team 1") == "India") | (col("Team 2") == "India")) & (col("Winner") == "Tied")).count()

print('india total win rate', float(india_win_rate) / float(total_games_india_played) * 100)
print('india total lose rate', float(india_lose_rate) / float(total_games_india_played) * 100)
print('india total tie rate', float(india_tie_rate) / float(total_games_india_played) * 100)


###############################################
#How many matches has India played against different ICC teams?

india_home_games = df.filter((col("Team 1") == "India")).select('Team 2').distinct().withColumnRenamed('Team 2','Team')
india_away_games = df.filter((col("Team 2") == "India")).select('Team 1').distinct().withColumnRenamed('Team 1','Team')
# intersect_df = india_home_games.select('Team 2').intersect(india_away_games.select('Team 1'))
union_count = india_home_games.union(india_away_games).distinct().count()

print('india unique team played',union_count)



# to remove all info messages
# go to /usr/lib/spark/conf in emr cluster
# open log4j.properties
# change "log4j.rootCategory=INFO, console" to "log4j.rootCategory=WARN, console"

# copy csv file to hadoop hdfs system
# hdfs dfs -copyFromLocal /home/hadoop/originalDataset.csv /user/hadoop/originalDataset.csv
