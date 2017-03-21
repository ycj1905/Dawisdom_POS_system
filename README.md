#使用Php運行在Raspberry Pi 上的 POS(Point of Sale)系統

Demo:
http://www.yingjheng.com/index.html

功能:

1. 顧客: 掃描餐廳桌上QRcode連到點餐系統、自動新增點餐序號、點餐、結帳
2. 節帳結帳人員: 登入、輸入序號後結帳(出餐內容至內場)、列印發票(shell script實作)
3. 內場: 登入、查看出餐內容
4. 店家: 登入、查看單月明細、修改菜單、監控餐廳影像(carousel圖片實作)

note:

1.設定 configuration in cartchen/cart_config.php, cartchen/cart_config_cart.php, cartchen/cart_config.login.php

2.開發時沒有Design Pattern概念, 無實作關注點分離
