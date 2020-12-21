#include ../ServerLib.ahk
; #include ../../ServerLib_A.ahk
; LicenseS := new Server_A("ID","PW")
; MsgBox,% License.ResetPC("test1234")

License := new Server("test1234","test1234")
; License := new Server("Test1111","Test1111")
; MsgBox,% License.Login()
UserState := License.Login()
; -1 라이센스 기간 없음
; 0 로그인 실패
; 1 로그인 성공

switch (UserState)
{
    case "-1":
        msgbox, 라이센스 설정 없음
        ExitApp
    case "1":
        msgbox, 로그인 성공
        gosub, loginOK
    case "0":
        msgbox, 로그인 실패
        return
    default:
        msgbox, 동작안됨
        ExitApp
}
Return

loginOK:
; 종료시 중복로그인 리셋하기
    msgbox, % License.ResetPC("test1234")
Return