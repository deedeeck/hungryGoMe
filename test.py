import pyspark
from pyspark.sql import SQLContext
from pyspark.sql.functions import col,rank
import pyspark.sql.functions as f

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
# How many unique teams has india play against?
# ow many matches has India played against different ICC teams?

india_home_games = df.filter((col("Team 1") == "India")).select('Team 2').distinct().withColumnRenamed('Team 2', 'Team')
india_away_games = df.filter((col("Team 2") == "India")).select('Team 1').distinct().withColumnRenamed('Team 1', 'Team')
# intersect_df = india_home_games.select('Team 2').intersect(india_away_games.select('Team 1'))
union_count = india_home_games.union(india_away_games).distinct().count()

print('india unique team played', union_count)

###############################################
# How many matches India has won or lost against different teams?

india_wins = df.filter(((col("Team 1") == "India") | (col("Team 2") == "India")) & (col("Winner") == "India")).groupBy("Team 1", "Team 2").count().withColumnRenamed('count', 'Win')
india_lose = df.filter(((col("Team 1") == "India") | (col("Team 2") == "India")) & (col("Winner") != "India")).groupBy("Team 1", "Team 2").count().withColumnRenamed('count','Lose')

india_wins = india_wins.alias("india_wins")
india_lose = india_lose.alias("india_lose")

# india_combined_results = india_wins.join(india_lose,(col("india_wins.Team 1") == col("india_lose.Team 1")) & (col("india_wins.Team 2") == col("india_lose.Team 2")),"outer").show()
india_combined_results = india_wins.join(india_lose,["Team 1","Team 2"],"outer").show()

###############################################
# Which are the home and away grounds where India has played most number of matches?

# india_home_games = df.filter(col("Team 1") == "India").groupBy("Ground").count().agg({'count':'max'}).show()
# from pyspark.sql.window import Window
# window_spec = Window().orderBy(col("count").desc())
# india_home_games = df.filter(col("Team 1") == "India").groupBy("Ground").count()
# india_home_games.show().orderBy(col("count").desc())
# india_home_games.select("*",f.max("count").over(window_spec).alias('max')).show()

india_home_games = df.filter(col("Team 1") == "India").groupBy("Ground").count()
max_value = india_home_games.agg({'count':'max'}).first()[0]
india_home_games.select("*").where(col('count') == ba).show()


###############################################
# What has been the average Indian win or loss by Runs per year?
from pyspark.sql.functions import year
from pyspark.sql.functions import from_unixtime, unix_timestamp 

df2 = df.withColumn('Match Date',from_unixtime(unix_timestamp('Match Date', 'MMM d, yyyy')).alias('TS Date').cast("timestamp"))
df2.printSchema()


india_year_df = df2.filter((col("Team 1") == "India") | (col("Team 2") == "India")).groupBy(year("TS Date")).count().show()

# no time to finish



# to remove all info messages
# go to /usr/lib/spark/conf in emr cluster
# open log4j.properties
# change "log4j.rootCategory=INFO, console" to "log4j.rootCategory=WARN, console"

# copy csv file to hadoop hdfs system
# hdfs dfs -copyFromLocal /home/hadoop/originalDataset.csv /user/hadoop/originalDataset.csv

# ssh -i pearl-key.pem -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null ec2-user@ec2-52-221-225-84.ap-southeast-1.compute.amazonaws.com
