#include<bits/stdc++.h>
using namespace std ;
int n; 
string s[4][109];

 int count(string arr []  , int a){
 	int s=0;
 	char x=a+'0';
	 for (int i=0 ;i<n; i++)
 	 for (int j=0 ;j<n; j++)
 	{
 		if (x!=arr[i][j]) s++ ;
		 a=1-a ;
		 x=a+'0';
 	}
 	return s;
 }


void solve(){
	cin >> n;
	for(int k = 0; k < 4; ++k)
	for(int i = 0; i < n; ++i)
	cin >> s[k][i];
	
	int mini=n*n*4;
	mini=min(mini,count(s[0],1)+count(s[1],1)+count(s[2],0)+count(s[3],0));
	mini=min(mini,count(s[0],1)+count(s[1],0)+count(s[2],1)+count(s[3],0));
	mini=min(mini,count(s[0],1)+count(s[1],0)+count(s[2],0)+count(s[3],1));
	mini=min(mini,count(s[0],0)+count(s[1],1)+count(s[2],1)+count(s[3],0));
	mini=min(mini,count(s[0],0)+count(s[1],1)+count(s[2],0)+count(s[3],1));
    mini=min(mini,count(s[0],0)+count(s[1],0)+count(s[2],1)+count(s[3],1));
    cout << mini ;
}

int main(){
	solve(); 
	return 0 ;
}
