 #! /bin/bash
 > userNames
 > labStatus
 ./retrieveLabData.sh;
users=`cat status.txt | awk '{print $2 }'`;
for i in $users
do
finger $i | grep "Name" | awk '{print $4}' >> userNames ;
echo ".";
done
cat status.txt | awk '{print $1, $2, $3}' | cat userNames ;
paste -d' ' status.txt userNames >> labStatus;
cat labStatus;
