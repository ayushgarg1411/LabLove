#include <iostream>
#include <iomanip>
#include <string.h>
#include <occi.h>
#include <termios.h>
#include <unistd.h>
#include <fstream>
#include <ctime>
using namespace std;
using namespace oracle::occi;

string readPassword()
{
    struct termios settings;
    tcgetattr( STDIN_FILENO, &settings );
    settings.c_lflag =  (settings.c_lflag & ~(ECHO));
    tcsetattr( STDIN_FILENO, TCSANOW, &settings );

    string password = "";
    getline(cin, password);

    settings.c_lflag = (settings.c_lflag |   ECHO );
    tcsetattr( STDIN_FILENO, TCSANOW, &settings );
    return password;
}
string desensitize(char *s)
{
    string ds = "";
    for(int i = 0; i < strlen(s); i++) {
        if (s[i] == '\'') {
            ds = ds + "\\";
        }
        ds = ds + s[i];
    }
    return ds;
}
void createG(Connection *conn){
    try {
    Statement *gtat = conn->createStatement("CREATE TABLE GHOST(gname VARCHAR(20) PRIMARY KEY, gStatus INT)"); 
    gtat->executeQuery();
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
        
    }
}
void create(Connection *conn){
    try {
    Statement *ctat = conn->createStatement("CREATE TABLE LAB(cid VARCHAR(5) PRIMARY KEY, uname VARCHAR(20), status INT, name VARCHAR(30))");
    ctat->executeQuery();
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
        
    }
}
void deleteTable(Connection *conn){
      try {
    Statement *dtat = conn->createStatement("DELETE FROM LAB "); 
    dtat->executeQuery();
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
        
    }
}
void deleteGhost(Connection *conn){
      try {
    Statement *dtat = conn->createStatement("DELETE FROM ghost"); 
    dtat->executeQuery();
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
        
    }
}
void popGhost(Connection *conn, string uname){
       try{
        Statement *dtat = conn->createStatement("INSERT INTO ghost VALUES(:1,1)");
        dtat->setString(1,uname);
        dtat->executeQuery();
        conn->commit();
        } catch (SQLException & e) {
        cout << e.what();

    }
}
void populate(Connection *conn,string cid, string uname, int status, string name){  
     try {
        // establish database connection
        Statement *dtat = conn->createStatement("INSERT INTO lab VALUES(:1,:2,:3, :4)"); 
        dtat->setString(1,cid);
        dtat->setString(2,uname);
        dtat->setInt(3,status);
        dtat->setString(4,name);
        dtat->executeQuery();
        conn->commit();
    } catch (SQLException & e) {
        cout << e.what();

    }
}
void populateTable(Connection *conn){
    ifstream infile("labStatus");
                string cid;
                string uname;
                string name;
                int status;
                while(!infile.eof()){
                    infile >> cid;
                    infile >> uname;
                    infile >> status;
                    infile >> name;
                    populate(conn,cid,uname,status, name); 
                    popGhost(conn,uname);

                }
}
void show(Connection *conn){
       try {
    Statement *dtat = conn->createStatement("select * from lab"); 
    ResultSet *show = dtat->executeQuery();
    ofstream outData("database.txt",std::ios_base::out);
    if(show->next())
    {
        do{
            outData<< show->getString(1) <<" "<< show->getString(2)<< " " << show->getString(3)<< " " << show->getString(4) << endl;

        }while(show->next());
    }else{
        cout << "nothing to desplay, populate table using 'populate' commmand"<<endl;
    }
    conn->commit();
    Statement *gtat = conn->createStatement("select * from ghost"); 
    ResultSet *ghost = gtat->executeQuery();
    cout<< "ghost table"<< endl;
    if(ghost->next()){
        do{
            outData << ghost->getString(1)<< " " << ghost->getString(2) << endl;
        }while(ghost->next());
    }
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
        
    }
}

void checkStatus(Connection *conn){
       try {
    Statement *dtat = conn->createStatement("select cid from lab where status ='1'"); 
    ResultSet *show = dtat->executeQuery();
    if(show->next())
    {
        do{
            cout<< show->getString(1) <<endl;

        }while(show->next());
    }else{
        cout << "nothing to desensitizesplay, populate table using 'populate' commmand"<<endl;
    }
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
        
    }
}
void checkGhostoff(Connection *conn){
    try {
    Statement *dtat = conn->createStatement("select distinct(l.name) from lab l, ghost g where l.uname = g.gname AND gstatus ='0'"); 
    ResultSet *show = dtat->executeQuery();
    if(show->next())
    {
        do{
            cout<< show->getString(1) << endl;
        }while(show->next());
    }else{
        cout << "nothing to desplay"<<endl;
    }
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
        
    }
}
void updateGhostON(Connection *conn, string uname){
    try {
    Statement *dtat = conn->createStatement("UPDATE ghost SET gStatus = 0 where gname = :1"); 
    dtat->setString(1,uname);
    int x = dtat->executeUpdate();
    cout << x << endl;
    conn->commit();
    } catch (SQLException & e) {
        cout << e.what();
    }
}

void reset(Connection *conn){
            deleteTable(conn);
            create(conn);
            populateTable(conn);
            show(conn);
    }



int main(int argc, char *argv[])
{
    string userName = "";
    string password = "";
    string command ="";
    bool created = false;
    const string connectString = "sunfire.csci.viu.ca";
    cout << "Your user name: ";
    getline(cin, userName);
    cout << "Your password: ";
    password = readPassword();
    Environment *env = Environment::createEnvironment();
    Connection *conn = env->createConnection(userName, password, connectString);
    cout << endl;
    while(true){
    cout << "input command"<< endl;
    getline(cin,command);
    if(command == "exit")return false;
    else{
        if(command == "start"){
        create(conn); 
        createG(conn);
        cout<< "both tables created" << endl;
       }
       if(command == "deleteAll"){
        deleteTable(conn);
        deleteGhost(conn);
        cout<< "both tables deleted" << endl;
       }
        if(command == "delete"){
            deleteTable(conn);
            cout<<"Lab table deleted" << endl;
        
        }
        if(command == "populate"){
            populateTable(conn);
            cout<< "populated both tables " << endl;
            }
        if(command == "show"){
            show(conn);
        }
        if(command == "check"){
            checkStatus(conn);

        }
        if(command == "ghost"){
            checkGhostoff(conn);

        }
        if(command == "reset"){
            reset(conn);
        }
        if(command == "on"){
            string name = "";
            getline(cin,name);
            updateGhostON(conn, name);
        }
    }
}

    
    return 0;
}
