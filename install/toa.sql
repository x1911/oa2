DROP TABLE IF EXISTS PO_ads;
CREATE TABLE PO_ads (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  adsurl text,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS PO_app;
CREATE TABLE PO_app (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  content text,
  user text,
  number varchar(20) DEFAULT NULL,
  untildate datetime DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_app_log;
CREATE TABLE PO_app_log (
  id int(10) NOT NULL AUTO_INCREMENT,
  app_id varchar(20) DEFAULT NULL,
  app_option_id varchar(20) DEFAULT NULL,
  user varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  content varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_app_option;
CREATE TABLE PO_app_option (
  id int(10) NOT NULL AUTO_INCREMENT,
  app_id varchar(20) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  number varchar(20) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_bbs;
CREATE TABLE PO_bbs (
  id int(10) NOT NULL AUTO_INCREMENT,
  bbsclass varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  author varchar(60) DEFAULT NULL,
  origin varchar(255) DEFAULT NULL,
  content text,
  issuedate datetime DEFAULT NULL,
  readnum varchar(60) DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_bbsclass;
CREATE TABLE PO_bbsclass (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  classadmin varchar(255) DEFAULT NULL,
  type varchar(20) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_bbs_log;
CREATE TABLE PO_bbs_log (
  id int(10) NOT NULL AUTO_INCREMENT,
  bbsid varchar(20) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  author varchar(60) DEFAULT NULL,
  content text,
  enddate datetime DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_blog;
CREATE TABLE PO_blog (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  content text,
  number int(10) DEFAULT NULL,
  user text,
  type varchar(10) DEFAULT NULL,
  date date DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_communication;
CREATE TABLE PO_communication (
  id int(8) NOT NULL AUTO_INCREMENT,
  person varchar(20) DEFAULT NULL,
  tel varchar(80) DEFAULT NULL,
  phone varchar(40) DEFAULT NULL,
  fax varchar(40) DEFAULT NULL,
  mail varchar(80) DEFAULT NULL,
  zipcode varchar(10) DEFAULT NULL,
  address varchar(40) DEFAULT NULL,
  position varchar(20) DEFAULT NULL,
  sex varchar(10) DEFAULT NULL,
  msn varchar(50) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  company varchar(60) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_conference;
CREATE TABLE PO_conference (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  subject varchar(100) DEFAULT NULL,
  content text,
  appperson varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  attendance text,
  startdate datetime DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  conferenceroom varchar(10) DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  otype varchar(10) DEFAULT NULL,
  staffid varchar(50) DEFAULT NULL,
  recorduser varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_conference_record;
CREATE TABLE PO_conference_record (
  rid int(10) NOT NULL AUTO_INCREMENT,
  conferenceid varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  attendance text,
  conferenceroom varchar(10) DEFAULT NULL,
  recordperson varchar(10) DEFAULT NULL,
  appendix varchar(200) DEFAULT NULL,
  content text,
  PRIMARY KEY (rid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_config;
CREATE TABLE PO_config (
  id int(10) NOT NULL AUTO_INCREMENT,
  value text,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_department;
CREATE TABLE PO_department (
  id int(11) NOT NULL AUTO_INCREMENT,
  persno varchar(40) DEFAULT NULL,
  name varchar(40) DEFAULT NULL,
  date datetime DEFAULT NULL,
  father varchar(10) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_document;
CREATE TABLE PO_document (
 id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  content text,
  documentid varchar(50) DEFAULT NULL,
  annex varchar(255) DEFAULT NULL,
  `key` varchar(16) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  uid varchar(16) DEFAULT NULL,
  date datetime DEFAULT NULL,
  readuser text,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_document_type;
CREATE TABLE PO_document_type (
  id int(10) NOT NULL AUTO_INCREMENT,
  father varchar(10) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_fileoffice;
CREATE TABLE PO_fileoffice (
  id int(8) NOT NULL AUTO_INCREMENT,
  number varchar(32) DEFAULT NULL,
  fileid varchar(64) DEFAULT NULL,
  filetype varchar(2) DEFAULT NULL,
  officetype varchar(2) DEFAULT NULL,
  officeid varchar(64) DEFAULT NULL,
  filename varchar(255) DEFAULT NULL,
  fileaddr varchar(255) DEFAULT NULL,
  uid varchar(32) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_humancontract;
CREATE TABLE PO_humancontract (
  id int(10) NOT NULL AUTO_INCREMENT,
  userid varchar(20) DEFAULT NULL,
  number varchar(60) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  ckey varchar(10) DEFAULT NULL,
  signdate varchar(60) DEFAULT NULL,
  testdate varchar(60) DEFAULT NULL,
  testday varchar(30) DEFAULT NULL,
  testenddate varchar(60) DEFAULT NULL,
  signnum varchar(30) DEFAULT NULL,
  appendix varchar(255) DEFAULT NULL,
  content text,
  uid varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  signenddate varchar(60) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_keytable;
CREATE TABLE PO_keytable (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  inputname varchar(255) DEFAULT NULL,
  inputvalue varchar(255) DEFAULT NULL,
  inputchecked varchar(5) DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  number int(10) DEFAULT NULL,
  fatherid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_knowledge;
CREATE TABLE PO_knowledge (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  content text,
  number int(10) DEFAULT NULL,
  categoryid varchar(10) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  appendix varchar(128) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_loginlog;
CREATE TABLE PO_loginlog (
  id int(10) NOT NULL AUTO_INCREMENT,
  uid int(10) DEFAULT NULL,
  name varchar(20) DEFAULT NULL,
  ip varchar(50) DEFAULT NULL,
  logindate datetime DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_menu;
CREATE TABLE PO_menu (
  menuid int(10) NOT NULL AUTO_INCREMENT,
  menuname varchar(255) DEFAULT NULL,
  menuurl varchar(255) DEFAULT NULL,
  fatherid varchar(10) DEFAULT NULL,
  menutype varchar(10) DEFAULT NULL,
  menunum int(25) DEFAULT '9999',
  menukey varchar(10) DEFAULT NULL,
  PRIMARY KEY (menuid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_news;
CREATE TABLE PO_news (
  id int(10) NOT NULL AUTO_INCREMENT,
  category varchar(10) DEFAULT NULL,
  receive text,
  phonereceive varchar(200) DEFAULT NULL,
  subject varchar(120) DEFAULT NULL,
  content text,
  appendix varchar(120) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  pic varchar(120) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_news_read;
CREATE TABLE PO_news_read (
  rid int(10) NOT NULL AUTO_INCREMENT,
  uid varchar(30) DEFAULT NULL,
  disdate datetime DEFAULT NULL,
  viewdate datetime DEFAULT NULL,
  evaluation varchar(200) DEFAULT NULL,
  dkey varchar(10) DEFAULT NULL,
  newsid varchar(10) DEFAULT NULL,
  PRIMARY KEY (rid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_news_type;
CREATE TABLE PO_news_type (
  nid int(10) NOT NULL AUTO_INCREMENT,
  ntitle varchar(60) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  ntype varchar(10) DEFAULT NULL,
  ndate datetime DEFAULT NULL,
  PRIMARY KEY (nid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_ntkohtmlfile;
CREATE TABLE PO_ntkohtmlfile (
  id mediumint(10) NOT NULL AUTO_INCREMENT,
  filename varchar(256) DEFAULT NULL,
  filepath varchar(256) DEFAULT NULL,
  filesize varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_ntkoofficefile;
CREATE TABLE PO_ntkoofficefile (
  id mediumint(10) NOT NULL AUTO_INCREMENT,
  filename varchar(256) DEFAULT NULL,
  filesize mediumint(10) DEFAULT NULL,
  otherdata varchar(128) DEFAULT NULL,
  filetype varchar(64) DEFAULT NULL,
  filenamedisk varchar(256) DEFAULT NULL,
  attachfilenamedisk varchar(256) DEFAULT NULL,
  attachfiledescribe varchar(256) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_ntkopdffile;
CREATE TABLE PO_ntkopdffile (
  id mediumint(10) NOT NULL AUTO_INCREMENT,
  pdffilename varchar(256) DEFAULT NULL,
  pdffilepath varchar(256) DEFAULT NULL,
  filesize varchar(256) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_oalog;
CREATE TABLE PO_oalog (
  id int(10) NOT NULL AUTO_INCREMENT,
  uid varchar(20) DEFAULT NULL,
  content text,
  title varchar(255) DEFAULT NULL,
  startdate datetime DEFAULT NULL,
  contentid varchar(20) DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_office_type;
CREATE TABLE PO_office_type (
  oid int(10) NOT NULL AUTO_INCREMENT,
  oname varchar(255) DEFAULT NULL,
  otype varchar(10) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (oid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_online;
CREATE TABLE PO_online (
  id int(10) NOT NULL AUTO_INCREMENT,
  startdate datetime DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_phone_channel;
CREATE TABLE PO_phone_channel (
  id int(10) NOT NULL AUTO_INCREMENT,
  company varchar(255) DEFAULT NULL,
  price varchar(255) DEFAULT NULL,
  content varchar(255) DEFAULT NULL,
  connection text,
  remainsum varchar(30) DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  connectionid varchar(255) DEFAULT NULL,
  pkey varchar(5) DEFAULT NULL,
  username varchar(255) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  toaid varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_phone_receive;
CREATE TABLE PO_phone_receive (
  id int(8) NOT NULL AUTO_INCREMENT,
  content varchar(500) DEFAULT NULL,
  sendphone varchar(30) DEFAULT NULL,
  date varchar(30) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_phone_send;
CREATE TABLE PO_phone_send (
  id int(10) NOT NULL AUTO_INCREMENT,
  content varchar(500) DEFAULT NULL,
  receivephone varchar(30) DEFAULT NULL,
  sendperson varchar(10) DEFAULT NULL,
  receiveperson varchar(30) DEFAULT NULL,
  date datetime DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  channelid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_plan;
CREATE TABLE PO_plan (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  content text,
  startdate datetime DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  otype varchar(10) DEFAULT NULL,
  department varchar(255) DEFAULT NULL,
  participation varchar(255) DEFAULT NULL,
  person varchar(255) DEFAULT NULL,
  note varchar(500) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  completiondate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_position;
CREATE TABLE PO_position (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  content text,
  father varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_duty;
CREATE TABLE PO_duty (
  id int(11) NOT NULL AUTO_INCREMENT,
  number varchar(32) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  user text,
  startdate date DEFAULT NULL,
  enddate date DEFAULT NULL,
  content text,
  appendix varchar(255) DEFAULT NULL,
  note varchar(255) DEFAULT NULL,
  dkey varchar(2) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_duty_user;
CREATE TABLE PO_duty_user (
  id int(11) NOT NULL AUTO_INCREMENT,
  dutyid varchar(32) DEFAULT NULL,
  user varchar(16) DEFAULT NULL,
  startdate date DEFAULT NULL,
  enddate date DEFAULT NULL,
  content text,
  appendix varchar(255) DEFAULT NULL,
  note varchar(255) DEFAULT NULL,
  dkey varchar(2) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_duty_log;
CREATE TABLE PO_duty_log (
  id int(8) NOT NULL AUTO_INCREMENT,
  dutyid varchar(255) DEFAULT NULL,
  content text,
  progress varchar(32) DEFAULT NULL,
  appendix varchar(255) DEFAULT NULL,
  note varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(16) DEFAULT NULL,
  duid varchar(16) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_registration;
CREATE TABLE PO_registration (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(20) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  date date DEFAULT NULL,
  year varchar(8) DEFAULT NULL,
  month varchar(8) DEFAULT NULL,
  day varchar(8) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_registration_log;
CREATE TABLE PO_registration_log (
  lid int(11) NOT NULL AUTO_INCREMENT,
  rid varchar(16) DEFAULT NULL,
  hour varchar(16) DEFAULT NULL,
  note varchar(255) DEFAULT NULL,
  number varchar(16) DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  PRIMARY KEY (lid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_rewards;
CREATE TABLE PO_rewards (
  id int(10) NOT NULL AUTO_INCREMENT,
  user varchar(255) DEFAULT NULL,
  project varchar(10) DEFAULT NULL,
  rewardsdate varchar(30) DEFAULT NULL,
  wagesmonth varchar(30) DEFAULT NULL,
  rewardskey varchar(10) DEFAULT NULL,
  price varchar(30) DEFAULT NULL,
  content varchar(255) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_seal;
CREATE TABLE PO_seal (
  id int(10) NOT NULL AUTO_INCREMENT,
  sealurl varchar(255) DEFAULT NULL,
  sealtitle varchar(255) DEFAULT NULL,
  uid varchar(16) DEFAULT NULL,
  date datetime DEFAULT NULL,
  unionid varchar(16) DEFAULT NULL,
  sealtype varchar(2) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_session;
CREATE TABLE PO_session (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(20) DEFAULT NULL,
  password varchar(32) DEFAULT NULL,
  groupid smallint(5) unsigned NOT NULL DEFAULT '3',
  ip int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_sms_receive;
CREATE TABLE PO_sms_receive (
  id int(10) NOT NULL AUTO_INCREMENT,
  sendperson varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  content text,
  receiveperson varchar(10) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  smskey varchar(10) DEFAULT NULL,
  readdate datetime DEFAULT NULL,
  sendid varchar(10) DEFAULT NULL,
  online varchar(5) DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_sms_send;
CREATE TABLE PO_sms_send (
  id int(10) NOT NULL AUTO_INCREMENT,
  receiveperson text,
  content text,
  uid varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_training;
CREATE TABLE PO_training (
  id int(10) NOT NULL AUTO_INCREMENT,
  number varchar(255) DEFAULT NULL,
  name varchar(255) DEFAULT NULL,
  channel varchar(10) DEFAULT NULL,
  trform varchar(10) DEFAULT NULL,
  sponsor varchar(255) DEFAULT NULL,
  responsible varchar(255) DEFAULT NULL,
  participation varchar(50) DEFAULT NULL,
  address varchar(255) DEFAULT NULL,
  organization varchar(255) DEFAULT NULL,
  orgperson varchar(255) DEFAULT NULL,
  curriculum varchar(255) DEFAULT NULL,
  classhour varchar(30) DEFAULT NULL,
  startdate varchar(30) DEFAULT NULL,
  enddate varchar(30) DEFAULT NULL,
  price varchar(50) DEFAULT NULL,
  examination varchar(255) DEFAULT NULL,
  examinationdate datetime DEFAULT NULL,
  department text,
  user text,
  organizationinfo text,
  contactperson text,
  request text,
  appendix varchar(255) DEFAULT NULL,
  content text,
  type varchar(10) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_training_record;
CREATE TABLE PO_training_record (
  id int(11) NOT NULL AUTO_INCREMENT,
  user text,
  trainingid varchar(20) DEFAULT NULL,
  price varchar(60) DEFAULT NULL,
  organization varchar(255) DEFAULT NULL,
  training varchar(30) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_upload;
CREATE TABLE PO_upload (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  aid int(10) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(20) NOT NULL DEFAULT '',
  originalname varchar(100) NOT NULL DEFAULT '',
  filepath varchar(255) NOT NULL DEFAULT '',
  thumb varchar(255) NOT NULL DEFAULT '',
  filesize int(10) unsigned NOT NULL DEFAULT '0',
  filetype varchar(50) NOT NULL DEFAULT '',
  fileext char(10) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  downloads mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY aid (aid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_user;
CREATE TABLE PO_user (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(40) DEFAULT NULL,
  password varchar(40) DEFAULT NULL,
  departmentid varchar(10) DEFAULT NULL,
  flag varchar(2) DEFAULT NULL,
  date datetime DEFAULT NULL,
  ischeck varchar(2) DEFAULT NULL,
  userkey varchar(20) DEFAULT NULL,
  groupid varchar(2) DEFAULT NULL,
  positionid varchar(20) DEFAULT NULL,
  loginip text,
  online varchar(2) DEFAULT '0',
  keytype varchar(2) DEFAULT NULL,
  keytypeuser text,
  numbers int(11) DEFAULT '999',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_usergroup;
CREATE TABLE PO_usergroup (
  id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  groupname varchar(100) NOT NULL,
  purview text NOT NULL,
  type enum('system','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_user_view;
CREATE TABLE PO_user_view (
  vid int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  number varchar(60) DEFAULT NULL,
  sex varchar(20) DEFAULT NULL,
  birthdate date DEFAULT NULL,
  participationwork varchar(60) DEFAULT NULL,
  tel varchar(60) DEFAULT NULL,
  phone varchar(60) DEFAULT NULL,
  fax varchar(60) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  address varchar(255) DEFAULT NULL,
  qq varchar(255) DEFAULT NULL,
  contact varchar(255) DEFAULT NULL,
  homemana text DEFAULT NULL,
  homebg varchar(64) DEFAULT NULL,
  pic varchar(255) DEFAULT NULL,
  home_txt text DEFAULT NULL,
  hometype varchar(2) DEFAULT NULL,
  PRIMARY KEY (vid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_web;
CREATE TABLE PO_web (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(60) DEFAULT NULL,
  weburl varchar(120) DEFAULT NULL,
  content varchar(120) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_workdate;
CREATE TABLE PO_workdate (
  id int(11) NOT NULL AUTO_INCREMENT,
  otype varchar(2) DEFAULT NULL,
  startdate varchar(32) DEFAULT NULL,
  enddate varchar(32) DEFAULT NULL,
  content text,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  workdate date DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS PO_plugin;
CREATE TABLE PO_plugin (
  id int(8) NOT NULL AUTO_INCREMENT,
  title varchar(64) DEFAULT NULL,
  company varchar(32) DEFAULT NULL,
  version varchar(16) DEFAULT NULL,
  date datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  filename varchar(16) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10000 ;