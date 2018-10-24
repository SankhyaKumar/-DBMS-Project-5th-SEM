t=int(input())
a=[]
b=[]
c=0

for i in range(t):
    t1=int(input())
    for j in range(t1):
        b=[int(x) for x in input().split(' ')]
        a.append(b[0])
        if b[1]>c:
            c=b[1]
        
    
a.sort()
k=a.index(c)

print(t-k+1)
