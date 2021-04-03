#! /bin/bash
> allNames;
> allUNames;
> userList;
ls /home/student | grep -v "aquota" | grep -v "csci" | grep -v "guest" >> allUNames;
cat allUNames;
users=`cat allUNames | awk '{print $1 }'`;
for i in $users;
do

    finger $i | grep "Name" | awk '{print $4}' >> allNames ;
  echo ".";
done
paste -d' ' allUNames allNames >> userList;
cat userList
