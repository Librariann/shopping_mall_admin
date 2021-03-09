<h1>#PHP 쇼핑몰 개발</h1>
#벤치마킹 사이트 : http://www.ssumj.com/<br/>
#시작일시 : 2020-08-09 22:04:05<br/>
#마지막 업데이트 일시 : 2021-02-24<br/>
#마지막 업데이트 OS : Mac <br/>
#금일 작업범위 : 메인배너 등록 및 미리보기 작업<br/>
#Author : 박성현<br/>
#branch : Librariann<br/>
<br/>
<br/>

```
##해야 될 것
- [x] 로그인
- [x] 회원가입
- [x] 회원 정보 등록
- [x] 메뉴 등록 및 메뉴 리스트 페이지
- [x] 메인배너 등록 및 메인배너 리스트페이지
- [ ] 메인배너 삭제
- [ ] 서브배너 등록 및 서브배너 리스트페이지
- [ ] 서브배너 삭제
- [x] 회원 정보 수정 및 이미지 업로드
- [x] 상품등록
- [x] 상품수정
- [ ] 무통장 입금
```

```
#MariaDB charset utf-8으로 변경하는 법 :  <br/>
[mysqld]<br/>
init_connect="SET collation_connection = utf8_general_ci"<br/>
init_connect="SET NAMES utf8"<br/>
character-set-server = utf8<br/>
collation-server = utf8_general_ci<br/>
<br/>
<br/>
[client]<br/>
default-character-set=utf8<br/>
<br/>
[mysqldump]<br/>
default-character-set = utf8<br/>
<br/>
[mysql]<br/>
default-character-set = utf8<br/>
```

================================================

```
php 에러날때 디버깅 코드 <br />
error_reporting(E_ALL);<br/>
<br/>
ini_set("display_errors", 1);<br/>

=================================================

error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT


E_ALL은 모든 에러에 대하여 출력한다는 뜻입니다

E_DEPRECATED 는 특정기능/함수가 앞으로는 지원되지 않을 수 있는 경우 표시됩니다.

해당 문자열 앞에 ~가 붙으면 해당 오류는 출력하지 않는다는 뜻입니다

그래서 아래와 같이 & ~E_NOTICE  를 추가해 주면 앞어살펴본 변수선언 관련 에러가 표시되지 않습니다.

error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE
```
