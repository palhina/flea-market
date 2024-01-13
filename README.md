# アプリケーション名  
**COACHTECHフリマ**

## ページ一覧  
### ①新規会員登録ページ  
正しく情報を入力し「会員登録」ボタンを押下すると、②のログインページに遷移します。  
バリデーションルールは以下の通りです。(名前、メールアドレス、パスワードはいずれも必須項目)    
+ メールアドレス：191文字以内、文字列型（メールアドレス形式）。既に登録されているメールアドレスとの重複不可。  
+ パスワード：8文字以上191文字以内、文字列型。パスワードと確認用パスワードは同一のものが入力されていること。  
![新規会員登録](https://github.com/palhina/flea-market/assets/129643430/a6ac878b-77b1-4552-a37a-3db3c6e936c4)  
  
### ②ユーザーログインページ(一般利用者、ショップスタッフ)  
①で新規会員登録を完了、あるいはメニュー「ログイン」押下で表示されます。
登録した情報を正しく入力し「ログイン」ボタンを押下すると、③のおすすめ一覧画面が表示されます。  
バリデーションルールは新規会員登録時と同じです。  
![ログイン](https://github.com/palhina/flea-market/assets/129643430/a8b850f0-248c-4558-a631-bbe29b8d925f)  
  
### ③商品一覧ページ  
「COACHTECH」ロゴの押下、あるいはログイン成功で表示されます。  
おすすめは登録商品一覧、マイリストはお気に入りに登録している商品一覧を表示します。  
なお、未ログイン状態でマイリスト表示を押下するとログイン画面へリダイレクトします。　　
![おすすめ](https://github.com/palhina/flea-market/assets/129643430/f27ad623-9b99-4e93-9831-1287e315f26f)
 
  
### ④商品詳細ぺージ  
③や⑧の商品一覧ぺージにて、商品画像をクリックすると表示されます。  
表示されている星マークを押下するとマイリストに登録され、マークが黄色に変化します。もう一度押下するとマイリストから削除され、マークの色が白になります。  
吹き出しマーク押下で⑦コメントページへ遷移します。  
「購入する」ボタン押下で⑤購入ページへ遷移します。なお、すでに購入が一度完了している商品は「売り切れ」表示になりボタン押下ができなくなります。  
また、未ログイン状態で「購入する」ボタンを押下するとログイン画面へリダイレクトします。  
![商品詳細](https://github.com/palhina/flea-market/assets/129643430/5a9edc7a-89c1-4e5a-9a17-b86390fdf93b)  
![商品詳細(購入済み)](https://github.com/palhina/flea-market/assets/129643430/420c9871-cee2-4b5c-9bfc-383b8fa3e553)  
  
### ⑤購入ページ    
④商品詳細ページにて、「購入する」ボタン押下で遷移します。  
配送先について、住所をすでに登録済みの場合はそれが表示されます。「変更する」ボタン押下で案内画面が表示された後⑨プロフィール編集画面に遷移します。  
住所が登録されていない場合、「変更する」ボタン押下で⑥住所登録ページへ遷移します。  
バリデーションルールは、支払方法・配送先ともに選択必須としています。  
![購入画面](https://github.com/palhina/flea-market/assets/129643430/812ca3d2-70eb-4fe1-aae5-6af99f77b6a8)　　

### ⑥住所登録ページ    
住所の新規登録を行います。  
バリデーションルールは以下の通りです。　  
+ 郵便番号：入力必須、8文字(123-4567の形式で入力）    
+ 住所：入力必須、191文字以内、文字列型。  
+ 建物名：191文字以内、文字列型。   
![住所登録](https://github.com/palhina/flea-market/assets/129643430/426f9ca8-2bc1-4c87-b620-f0665e1e8749)　

### ⑦コメントページ    
④商品詳細ページの吹き出しマーク押下で表示されます。  
コメント投稿者のプロフィール画像と名前が左にあるのは他人、右はログイン中ユーザーのものとしています。  
なお、ログイン中ユーザーのコメント左下にある「×」ボタン押下で、コメント削除が可能です。  
コメントのバリデーションルールは、2000文字以下、文字列型、入力必須としています。  
![コメント](https://github.com/palhina/flea-market/assets/129643430/b2de5ca0-c1f7-4a65-9b84-e8c5567e61a9)  

### ⑧マイページ    
ログイン中にナビゲーションメニューに表示される「マイページ」ボタン押下で表示されます。  
「購入した商品」「出品した商品」押下でそれぞれ該当ユーザーが購入/出品した商品が表示されます。  
![マイページ(購入)](https://github.com/palhina/flea-market/assets/129643430/1a2b50b5-4b58-411f-8f77-df148d4ed048)

### ⑨プロフィール編集ページ    
⑧マイページの「プロフィールを編集」ボタン押下で表示されます。  
既に登録済みの画像、ユーザー名、アドレス等が表示されますが、アドレスが未登録の場合は⑥住所登録ページへ遷移します。  
ユーザー名のバリデーションルールは191文字以内、文字列型としており、アドレスについては⑥と同様です。  
なお、プロフィール画像についてはJPEG形式あるいはPNG形式のみ登録可能としています。
![プロフィール編集](https://github.com/palhina/flea-market/assets/129643430/3c8fdb5a-3453-4a2c-973f-f950279c8746)

### ⑩出品ページ    
ログイン中にナビゲーションメニューに表示される「出品」ボタン押下で表示されます。  
商品画像についてはJPEG、PNG形式のみ登録可能としています。  
バリデーションルールは以下の通りです。　  
+ 商品名：入力必須、191文字以内、文字列型。    
+ 商品詳細：入力必須、2000文字以内、文字列型。  
+ 商品価格：入力必須、数値型、最大99999999。
+ 商品カテゴリー、状態：入力必須。（カテゴリーは必須部分のみバリデーション設定）
+ 商品画像は入力任意。  
![出品](https://github.com/palhina/flea-market/assets/129643430/e95179ec-0172-43f5-bd31-bbcb3e192d27)

### 管理者、店舗代表者登録ページ    
管理者ログイン画面下「管理者新規登録はこちら」ボタン、管理者メニュー「店舗代表者作成」ボタン押下で表示されます。  
バリデーションルールは名前：入力必須、文字列型、最大191文字としており、その他はユーザー新規登録時と同様です。  
  
### 管理者、店舗代表者ログインページ    
未ログイン時、ヘッダーメニューの「管理者」「店舗代表者」ボタン押下で表示されます。  
バリデーションルールは、ユーザーログイン時と同様です。  
![管理者ログイン](https://github.com/palhina/flea-market/assets/129643430/813a5d8d-673f-4327-9e1f-6c1f9f055dd9)

### 店舗代表者メニュー
![店舗代表者メニュー](https://github.com/palhina/flea-market/assets/129643430/d4621a54-eda6-49e0-84df-e19fe01cb108)
「スタッフ招待」ボタンでスタッフアカウント作成ページを表示します。
バリデーションルールは管理者・店舗代表者登録時と同様です。  
![スタッフ招待](https://github.com/palhina/flea-market/assets/129643430/9ec3fc5f-4343-42c0-918b-8137d0aa034f)  
「スタッフ削除」ボタンで現在登録しているショップスタッフの一覧が表示され、「×」ボタン押下で該当スタッフデータが削除されます。  
![スタッフ削除](https://github.com/palhina/flea-market/assets/129643430/a3131ff0-e0dd-4d51-8ad4-90fcd36eee54)

### 管理者メニュー　　
![管理者メニュー](https://github.com/palhina/flea-market/assets/129643430/a271c6b4-59f3-45f7-8626-4b65b5ecb62b)  
「利用者削除」ボタンで、利用者(一般ユーザー・ショップスタッフ)一覧が表示されます。  
×ボタン押下で該当のユーザーデータが消去されます。  
![ユーザー削除](https://github.com/palhina/flea-market/assets/129643430/934fb3ab-7860-4e47-8816-87f2ceeb44c6)  
「取引履歴確認」ボタン押下で、登録店舗の商品を購入したユーザーの履歴が表示されます。  
![取引履歴確認](https://github.com/palhina/flea-market/assets/129643430/a369cd97-7ca7-40a3-be72-77ffaddfce69)  
「メール送信」ボタン押下で、ユーザー(一般ユーザー、ショップスタッフ、あるいは両方)へメールを送信する画面へ遷移します。  
バリデーションルールは、いずれも選択必須としタイトル（最大100文字、文字列型）、本文（文字列型、最大2000文字）と設定しています。  
![メール送信](https://github.com/palhina/flea-market/assets/129643430/34370596-eda8-4a16-82a8-40924267535e)
    
## 作成した目的  
ある企業の、自社ブランドアイテムを出品するフリーマーケットサイトを作成    

## アプリケーションURL  
GithubURL：https://github.com/palhina/flea-market.git  
　(開発環境用ElasticIP)  15.168.119.27   
　(本番環境用ElasticIP)  54.178.44.196  
URL  http://coachtech-fleamarket.click	（本番環境と紐づけています）  

## ほかのレポジトリ  
今回はなし  

## 機能一覧  
新規ユーザー会員登録  
ユーザーログイン・ログアウト機能   
検索機能(キーワード：商品名、商品説明、カテゴリー)  
商品一覧取得  
商品詳細取得  
ユーザ商品お気に入り一覧取得  
ユーザ購入/出品商品一覧取得  
プロフィール作成・変更  
商品お気に入り追加/削除  
商品コメント追加/削除  
出品  
購入  
  
管理者、店舗代表者登録  
管理者、店舗代表者ログイン・ログアウト機能  
ショップスタッフの新規作成  
ユーザー・ショップスタッフのアカウント削除  
店舗と一般ユーザー間での取引履歴閲覧  
利用者(一般ユーザー、ショップスタッフ)へのメール送信  
  
## 使用技術(実行環境)  
Docker version 24.0.5  
Laravel 8.83.27  
Nginx 1.21.1  
MySQL 8.0.35  
PHP 8.1.2  
Composer 2.6.2  
PHP Unit 9.6.15  
Mailtrap

## テーブル設計      
![テーブル設計書](https://github.com/palhina/flea-market/assets/129643430/dcbc9ccf-e470-4052-9863-3ab887b480a3)
  
## ER図  
![market ER](https://github.com/palhina/flea-market/assets/129643430/076a1862-e43c-4691-9da5-4c4f1f9200a4)  
  
  
## 環境構築  

* インストール手順

１．プロジェクトを保存したいディレクトリに移動し、その後Githubからリポジトリをクローンします：

        $git clone https://github.com/palhina/flea-market.git
        
その後リポジトリのディレクトリに移動します：

        $cd flea-market

２．Dockerを使用し、アプリケーションを起動します：
	
         $docker-compose up -d --build

３．Laravelのパッケージをインストールするために、phpコンテナ内にログインします：
	
          $ docker-compose exec php bash

４．コンテナ内でComposerをインストールします：
	
         $composer install --ignore-platform-req=ext-gd

５．”.env”ファイルを作成し、データベース名、ユーザ名、パスワードなどの必要な環境変数を設定します：
	
         $cp .env.example .env

その後“.env”ファイルを編集し、必要な設定を追加、編集します。

６．アプリケーションキーを作成します：

        $php artisan key:generate

７．データベースのマイグレーションを実行します：

        $php artisan migrate
	
８．必要に応じて、ダミーデータの作成を行ってください：

        $php artisan db:seed
	
９．画像のアップロードを行うため、シンボリックリンクを作成します：

        $php artisan storage:link
  
  
* アプリケーションはデフォルトで http://localhost でアクセスできます。

* MySQLはデフォルトで http://localhost:8080 でアクセスできます。

* PHP Unitを用いてテストを作成しています。その際はコンテナ内にて$ php artisan testコマンドを実行してください。  
  その際データベースが消去されますので、必要に応じて再度ダミーデータの作成を実行してください。  
  
* ローカル環境でのメールの検証については、Mailtrapなどをご利用いただき.envファイルで環境設定を行ってください。
    
* エラーが発生する場合、$ sudo chmod -R 777 *コマンドにて権限変更を行ってみてください。
  

## 追記  
**ダミーデータについて**  
* 一般ユーザー、ショップスタッフデータ(usersテーブル)
ユーザー名test(メールアドレス、以下同様：111@mail.com)、test2(222@mail.com)を作成しています。
また、それぞれの住所(addressesテーブル)も作成しております。
ショップスタッフは店舗代表者名manager1が作成したものとして、staff1(staff1@mail.com)を登録しています。
パスワードはいずれも「1234567890」  
* マイリスト(favoritesテーブル)、コメント(commentsテーブル) 、販売済み商品(soldItemsテーブル)、商品の状態(conditionsテーブル)、カテゴリー(categoriesテーブルおよびItemCaregoriesテーブル)、支払方法(paymentsテーブル) 
  いずれも適当に作成しております。  
* 商品情報(itemsテーブル)  
  10個の商品名・画像・値段・出品者等の登録をしております。      
* 管理者データ(adminsテーブル)    
  管理者名admin_test、メールアドレスadmin1@mail.com、パスワードは「1234567890」で設定しています。
* 店舗代表者(managersテーブル)  
  店舗代表者名manager1(メールアドレス、以下同様：manager1@mail.com)、manager2(manager2@mail.com)を作成しています。  
  パスワードはいずれも「1234567890」です。    

**権限について**  
利用者として、usersテーブルには一般利用者とショップスタッフが含まれます。  
ショップスタッフは、商品の閲覧・コメント・出品は可能ですが、マイリスト登録や購入等のボタンは表示されないように設定しております。  
  
**AWS接続,ブラウザ上での閲覧について**  
以下の設定により、ブラウザ上でアプリケーションを閲覧することが可能です(HTTP接続のみ)。  
  
１．IAMユーザーでログイン  
　　ユーザー名：study（権限：administration）アカウントID：973518952750、パスワード：dYfX58MBでログインしてください。  
２．開発環境として、大阪リージョンにVPC(fleamarket-aws-vpc)を作成しております。  
　　EC2インスタンス(fleamarket-aws-web)とRDSインスタンス(fleamarket-aws-db)を開始してください。  
３．それぞれが正常に起動したことを確認し、EC2インスタンスのパブリックIPv4アドレス、あるいはパブリックIPv4DNSをブラウザに入力してください。  
　　なお、使用するS3バケット名はfleamarket-aws-s3としております。  
  
**開発環境と本番環境について**　　
* 開発環境は上記のように大阪リージョンに作成しております。  
* 本番環境を想定したものは、開発環境と異なるVPC(fleamarket-launch-vpc)およびリージョン(東京)で、EC2インスタンス名：fleamarket-launch-web、RDSインスタンス名：fleamarket-launch-db、S3バケット名：fleamarket-launch-s3adminとして作成しました。  
  本番環境はURL (http://coachtech-fleamarket.click) からアクセスも可能です。  
  その場合はElasticIPアドレスを発行しEC2インスタンスに紐づけた後、Route53のレコード名：coachtech-fleamarket.clickレコードタイプ：Aの値をElasticIPの値に変更してください。  
