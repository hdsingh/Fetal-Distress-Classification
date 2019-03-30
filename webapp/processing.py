import random

main = []
sub = []
for j in range(1000):
    r = random.randrange(100,200)
    sub.append(r)
main.append(sub)

sub = []
for j in range(1000):
    r = random.randrange(0,100)
    sub.append(r)
main.append(sub)

print(main)