## 기획의도
> #### 학교 기숙사를 사용하다 보면 비가 많이 오게 되어 이상한 냄새가 나거나 곰팡이가 생기는 기숙사 방이 있었고, 방에 들어가게 되면 너무 습하고 불편하였다. 이것을 방지하는 장치가 필요하다고 느껴 제작하게 되었다.

## 프로젝트 구성
---
### 소프트웨어 구성
> ##### Index.php : 메인페이지 & 메뉴를 보여줌
> ##### create.php : 습도를 측정하고자하는 방을 생성하는 기능
> ##### Delete.php : create를 활용하여 만든 방을 삭제하는 기능
> ##### v1,v2,v3 : 선택한 방에 대한 습도와 온도를 그래프로 표시하는 기능
> ##### Update.php : create 를 활용하여 만든 방의 정보를 수정하는 기능
> ##### Insert.php : 받은 값을 데이터베이스에 넣는 기능을 보유
> ##### Action.php : 전달 받은 값에 따라서 각각 다르게 처리함(저장 or 업데이트)
### 하드웨어 구성
> #### 입력 : A0 : 가스센서 , D0 : 습도센서<br>출력 : D2 : 릴레이 , D5,D6,D7 : RGB LED
> #### ![image](https://github.com/dlatldhs/smart_home/assets/80656700/454da7cf-36ce-46af-8544-220e9da4a99d)
### 기능
> - #### 센서값(습도,온도) 실시간 그래프<br> ![image](https://github.com/dlatldhs/smart_home/assets/80656700/e56cdd33-32c9-4881-b26b-a15ba6121458)
> #### CRUD
> - ##### 설치장소 생성 ![image](https://github.com/dlatldhs/smart_home/assets/80656700/f4b75fc3-75c9-455d-9eec-ebb1c69e4802)
> - ##### 설치장소 삭제 ![image](https://github.com/dlatldhs/smart_home/assets/80656700/3ea6e35e-7be8-4cdd-946d-a836904301b5)
> - ##### 설치장소 업데이트 ![image](https://github.com/dlatldhs/smart_home/assets/80656700/fa4866b5-a9f5-458f-ab61-3db3f49dc059)
> - ##### 설치장소 사용 ![image](https://github.com/dlatldhs/smart_home/assets/80656700/0a8c1d0c-0f7c-4382-b60e-46a595a25d06)

## 기대효과
> #### 1. 기숙사에 곰팡이를 방지하여 냄새를 좋은 냄새가 나게 할 수 있다.
> #### 2. 릴레이를 활용하여 다양하게 습도나 온도를 제어할 수 있다.
> #### 3. 사용자가 집 or 방을 갈 때에 미리 켜 두어 편안한 온도를 맞춰놓을 수 있다.
