
Create table timetable (days varchar (10) not null , 
	sub varchar (10) not null, 
	stime varchar (255) not null, 
	etime varchar (255) not null
);


Insert into timetable(days, sub, stime, etime) values 
("monday","CSCI 311", "0830", "1030"), 
("monday","free", "1030", "1130"), 
("monday","CSCI 311", "1130", "1330"), 
("monday","free", "1330", "2200"),
("tuesday", "free", "0830", "1430"), 
("tuesday", "CSCI 375", "1430", "1530"), 
("tuesday", "CSCI 370", "1530", "1630"), 
("tuesday", "free", "1630", "2200"), 
("wednesday", "free", "0830", "1330"),
("wednesday", "CSCI330", "1330", "1430"),
("wednesday", "free", "1430", "1600"),
("wednesday", "CSCI 251", "1600", "1800"),
("wednesday", "free", "1801", "2200"),
("thursday", "free", "0830", "1000"),
("thursday", "CSCI 460", "1000", "1100"),
("thursday", "free", "1101", "1130"),
("thursday", "CSCI 311", "1130", "1230"),
("thursday", "CSCI 251", "1230", "1430"),
("thursday", "CSCI 375", "1430", "1530"),
("thursday", "CSCI 460", "1530", "1630"),
("thursday", "CSCI 251", "1630", "1830"),
("thursday", "free", "1830", "2200"),
("friday", "free", "0830", "1000"),
("friday", "CSCI 370", "1000", "1100"),
("friday", "free", "1101", "1330"),
("friday", "CSCI 485", "1330", "1430"),
("friday", "CSCI 331", "1430", "1530"),
("friday", "CSCI 485", "1530", "1630"),
("friday", "CSCI 330", "1630", "1730"),
("friday", "free", "1730", "2200");

