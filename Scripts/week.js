today = new Date();
if(today.getDay()==0) day = "星期日&nbsp; 爆击率提高~ 里奇素描班开课";
if(today.getDay()==1) day = "星期一&nbsp; 生产成功增加~ 晚上红龙有约~";
if(today.getDay()==2) day = "星期二&nbsp; 地下掉宝率提高~明天维护";
if(today.getDay()==3) day = "星期三&nbsp; 9点-12点维护，商店银行打折，晚有沙漠龙来发钱";
if(today.getDay()==4) day = "星期四&nbsp; 释放成功提高，磨装备熟练更快~";
if(today.getDay()==5) day = "星期五&nbsp; 药水效果提高，晚上很热闹，王城炼金选拔日~";
if(today.getDay()==6) day = "星期六&nbsp; 年龄/炼金术成功增加，晚上王城有宴会~水城有料理赛";
document.write(day);