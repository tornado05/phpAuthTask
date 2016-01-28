FrontEnd:
	"login"
	"password"
	"token"

	
	

Token length: 128

Project sructure:
src
|--index.php
|-Public
|-DSL
|-DAL
|-Data

IDataLayer //common interface
{
	getUserByCred(login, password)
	getUserByToken(token, ip)
	destroyToken()
	setToken(id, token, ip )
}