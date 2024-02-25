from turtle import *
import colorsys as cs

bgcolor('black')
speed(40)
hideturtle()
for i in range(160):
    for color in ['red', 'blue', 'yellow']:
        pencolor(color)
        forward(i)
        left(60)
        right(12)
done()