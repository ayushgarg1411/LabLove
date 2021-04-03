#include <iostream>
#include <string>
#include <fstream>
#include <regex>

int main()
{
using namespace std;
int count = 0;
string line;
string s2 ="#";
regex reg ("[0-9]{2}[:][0-9]{2}");
ifstream file1("output");
if(file1.is_open())
{
  while (getline(file1, line)) {
      count++;
    }
    cout << count <<endl;
    file1.close();
  }

    ifstream file("output");
    ofstream opfile("status.txt");
    if(file.is_open())
    {
      if(file.is_open()) {

        string myArray[100][4];

        for(int i = 0; i <= count; ++i)
        {
          for(int j = 0; j < 4; ++j)
          {
            file >> myArray[i][j];
          }
        }
        for(int i = 0; i <= count; ++i)
        {
          if (myArray[i][2].find(s2)== std::string::npos){
            if (regex_match (myArray[i][3], reg)){
          for(int j = 0; j < 2; ++j)
          {
              opfile << myArray[i][j] << "  ";
            }
            opfile << "1";
          opfile<<endl;
        }
      }
    }
      file.close();
      opfile.close();
    }
    }
}
