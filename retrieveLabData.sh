 #! /bin/bash
logout="logout";
newL='\n';
sp='  ';
> output;
 for i in {1..9}
 do
   ssh cub$i 'w' | awk 'BEGIN { OFS = "," } FNR > 2{print "cub$ ",$1,$3,$4}' | tr -d ' '| tr -d '(' | tr -d ')' | tr ',' ' ' | tr '$' $i | tr '.' '#'  >> output;
   #users=$(ssh cub$i 'who' | awk '{print "cub$ "$1,$5,$3, $4}{print ";\n"}' |tr '$' $i | tr '(' ' ' | tr ')' ' ' );
   #users=$(ssh cub$i 'w' | awk 'BEGIN { OFS = ";" } FNR > 2 {print $1,$3,$4}' | tr ' ' '\t' | tr ';' ' ');
   #ipAddr=$(echo $users | awk '{print $3 }');
   ssh pup$i 'w' | awk 'BEGIN { OFS = "," } FNR > 2{print "pup$ ",$1,$3,$4}' | tr -d ' ' | tr -d '(' | tr -d ')' | tr ',' ' ' | tr '$' $i | tr '.' '#' >> output;
   echo ".";
done
for i in {10..17}
do
  ssh cub$i 'w' | awk 'BEGIN { OFS = "," } FNR > 2{print "cub$ ",$1,$3,$4}' | tr '$ ' $i | tr -d ' ' | tr -d '(' | tr -d ')' | tr ',' ' ' | tr '.' '#'  >> output;
  #users=$(ssh cub$i 'who' | awk '{print "cub$ "$1,$5,$3, $4}{print ";\n"}' |tr '$' $i | tr '(' ' ' | tr ')' ' ' );
  #users=$(ssh cub$i 'w' | awk 'BEGIN { OFS = ";" } FNR > 2 {print $1,$3,$4}' | tr ' ' '\t' | tr ';' ' ');
  #ipAddr=$(echo $users | awk '{print $3 }');
  ssh pup$i 'w' | awk 'BEGIN { OFS = "," } FNR > 2{print "pup$ ",$1,$3,$4}' | tr '$ ' $i | tr -d ' ' | tr ',' ' '  | tr -d '(' | tr -d ')' | tr '.' '#' >> output;
  echo ".";
done
./a.out;
cat output;
