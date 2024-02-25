from turtle import *
import colorsys as cs

bgcolor('black')
tracer(100)
pensize(1)
hideturtle()

def tk():
    h = 0
    n = 200
    for i in range(2, 2900):
        c = cs.hsv_to_rgb(h, 1, 1)
        h += 1/n
        up()
        goto(0, 0)
        down()
        color(c)
        circle(i, 100)

tk()
done()

