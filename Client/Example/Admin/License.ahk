#include ../../ServerLib.ahk
#include ../../ServerLib_A.ahk
License := new Server_A("ID","PW")
MsgBox,% License.License("test1234","2021-03-29")
; MsgBox,% License.License("test1111","2021-03-29")