# makefile for lablove, a csci 375 project

G = g++-4.9
CFLAGS = -I/usr/local/lib/Oracle/instantclient_11_2/sdk/include
LFLAGS = -L/usr/local/lib/Oracle/instantclient_11_2 -locci -lociei
all: LabLove

LabLove: LabLove.cpp
	$(G) $(CFLAGS) $(LFLAGS) LabLove.cpp -o LabLove

clean: 
	rm -f *.o LabLove
