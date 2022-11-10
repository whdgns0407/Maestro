<img src="https://github.com/whdgns0407/Maestro/blob/main/Introduction%20image/main.png?raw=true"><br><br>


# ※ 본 사이트 입금페이지의 비트코인주소와 쿼리 wallet table에 있는 비트코인주소에 자산을 절대 입금 하지 마십시오.
# 개발 배경
* 2018년도 통신판매업, 사업자등록만 하면 가상화폐거래소를 누구나 만들수 있었다.
* 그로 인하여 우후 죽순 생겨나는 가상화폐 신생 거래소가 100여개 이상 생겼고 회원들의 자산을 입금 받고 출금을 해주지 않는 일명 먹튀가 발생하게 된다.
* 본인은 이 위험성을 알리기 위해 업비트(docs.upbit.com)API를 활용하여 가상화폐 거래소 웹사이트를 제작하게 된다.
* 웹사이트의 개발로 신생 거래소의 위험성을 알리는 커뮤니티(코인판)게시글의 조회수가 20만회 이상 달성하게 된다.
* 코인판 주소 (로그인 후 확인가능) : https://coinpan.com/coin_info/118041119

# 개발환경
* 사용 언어 : PHP, MySQL, JavaScript, Jquery
* 프레임워크 : Bootstrap

# 제공하는 기능
# 메인페이지 
https://api.upbit.com/v1/candles/days?market=krw-btc API를 배열화 하여 비트코인 매수 가능 가격, 매도 가능 가격, 가격 변동률을 메인페이지에 표시하여 줌. 쿼리로 부터 최근 공지사항, 최근 게시글, 최근 댓글을 작성시간 기준 내림차순하여 5개 보여줌 여기서 작성시간이 24h가 초과되지 않을 경우 new이미지 삽입, 최근 게시글에서 댓글 입력이 댓글수를 표시함. 로그인을 한 경우 거래내역, 고객센터 문의, 내가 쓴 게시글, 내가 쓴 댓글을 오름차순으로 표시하여줌.

# 비트코인 매수/매도 거래
<img src="https://github.com/whdgns0407/Maestro/blob/main/Introduction%20image/exchange.png?raw=true">
https://api.upbit.com/v1/orderbook?markets=krw-btc API를 배열화 하여 매수와 매도와 갯수를 표시하여주며, https://api.upbit.com/v1/trades/ticks?market=krw-btc&count=10 API를 배열화 하여 최근 거래시각을 표시하여줌.
거래 갯수를 입력하여 요청 할 경우 거래가능금액에서 매수, 매도 하게 됨

# 확률게임 
<img src="https://github.com/whdgns0407/Maestro/blob/main/Introduction%20image/game.png?raw=true">
랜덤확률게임은 숫자를 입력받아 배팅을 하는 게임으로 2배를 입력하게 되면 2분의 1확률로 2배가 당첨, 3배를 입력하게 되면 3분의 1확률로 3배가 당첨, 100배를 입력하게 되면 100분의 1확률로 100배가 당첨됨. 돌림판게임은 자바스크립트를 활용하여 1~5배에 해당하는 금액을 지급함.

# 지갑관리 
<img src="https://github.com/whdgns0407/Maestro/blob/main/Introduction%20image/wallet.png?raw=true">
원화, 비트코인을 입출금 할 수 있는 곳.

# 자유게시판 
<img src="https://github.com/whdgns0407/Maestro/blob/main/Introduction%20image/board.png?raw=true">
회원들간에 자유롭게 소통할 수 있는 곳으로 제목과 내용을 입력 받아 글을 쓸 수 있으며 댓글로 의견을 주고 받을 수 있음. 만약 내용을 삭제하거나 수정하고 싶다면 삭제 수정도 가능함. 작성 시간 기준 24시간이 지나지 않으면 new이미지를 표시함

# 공지사항 
거래소 내 문제 발생, 회원들에게 알릴 고지가 있을 경우 작성하여 회원들에게 알려줄 수 있도록 만든 페이지. 작성 시간 기준 24시간이 지나지 않으면 new이미지를 표시함

# 고객센터 
<img src="https://github.com/whdgns0407/Maestro/blob/main/Introduction%20image/customer.png?raw=true">
회원들의 문의가 있을 경우 문의사항을 작성 할 수 있는 곳. 만약 답글이 달릴 경우 답변완료가 표시되고 그렇지 않을 경우 답변 대기중 메시지를 출력함.