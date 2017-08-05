<?php

if ($_SERVER['REQUEST_URI'] == "/Gametraders/includes/functions.php") {
	header("Location: ../404.php");
}

///////////////Mobile Redirection//////////
function mobileredirect(){
	$mobile = "http://mobile.icantradegames.com/";
if(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/3.0 (compatible; AvantGo 3.2)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; AvantGo 3.2; ProxiNet; Danger hiptop 1.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='DoCoMo/1.0/P502i/c10 (Google CHTML Proxy/1.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='DoCoMo/2.0 SH901iC(c100;TB;W24H12)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='DoCoMo/1.0/N503is/c10') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='KDDI-KC31 UP.Browser/6.2.0.5 (GUI) MMP/2.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='UP.Browser/3.04-TS14 UP.Link/3.4.4') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Vodafone/1.0/V802SE/SEJ001 Browser/SEMC-Browser/4.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='J-PHONE/5.0/V801SA/SN123456789012345 SA/0001JP Profile/MIDP-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='PDXGW/1.0 (TX=8;TY=6;GX=96;GY=64;C=G2;G=B2;GI=0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='ASTEL/1.0/J-0511.00/c10/smel') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/1.22 (compatible; MSIE 5.01; PalmOS 3.0) EudoraWeb 2.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='UP.Browser/6.1.0.1.140 (Google CHTML Proxy/1.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (Windows; U; Windows NT 5.1; ca; rv:1.5)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; PalmSource/Palm-D050; Blazer/4.3) 16;320x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.76 [en] (PalmOS; U; WebPro/3.0; Palm-Arz1)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.76 (compatible; MSIE 6.0; U; Windows 95; PalmSource; PalmOS; WebPro; Tungsten Proxyless 1.1 320x320x16)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible;MSIE 6.0;Windows95;PalmSource) Netfront/3.0;8;320x320') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible;MSIE 6.0;Windows95;PalmSource) Netfront/3.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.08 (Windows; Mobile Content Viewer/1.0) NetFront/3.2') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (PS2; PlayStation BB Navigator 1.0) NetFront/3.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (PDA; PalmOS/sony/model crdb/Revision:1.1.36(de)) NetFront/3.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (PDA; PalmOS/sony/model prmr/Revision:1.1.54 (en)) NetFront/3.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (PDA; Windows CE/0.9.3) NetFront/3.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (PDA; Windows CE/1.0.1) NetFront/3.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (PDA; SL-C750/1.0,Embedix/Qtopia/1.3.0) NetFront/3.0 Zaurus C750') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Xiino/1.0.9E [en] (v. 4.1; 153x130; g4)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry8703e/4.1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/105') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry7130e/4.1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/104') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry7250/4.0.0 Profile/MIDP-2.0 Configuration/CLDC-1.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry/3.6.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry7230/3.7.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry7230/3.7.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry7730/3.7.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='BlackBerry7730/3.7.1 UP.Link/5.1.2.5') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Gecko/20031007') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Plucker/Py-1.4') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 5.5; Windows NT) (compatible; MSIE 5.5; Windows NT)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='LG-LX550 AU-MIC-LX550/2.0 MMP/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='LGE-CX5450 UP.Browser/6.2.2.3.d.1.103 (GUI) MMP/2.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320; HP iPAQ h6300)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='mot-V3/OE.40.79R MIB/2.2.1 profile/MIDP-2.0 configuration/CLDC-1.0 UP.Link/6.2.3.15.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; Smartphone; 176x220)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='portalmmm/2.0 N410i(c20;TB)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='NokiaN80-3/1.0552.0.7Series60/3.0Profile/MIDP-2.0Configuration/CLDC-1.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; ; Linux armv5tejl; U) Opera 8.02 [en_US] Maemo browser 0.4.31 N770/SU-18') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (SymbianOS/9.1; U; en-us) AppleWebKit/413 (KHTML, like Gecko) Safari/413') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (SymbianOS/9.1; U; en-us) AppleWebKit/413 (KHTML, like Gecko) Safari/413') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia7610/2.0 (5.0509.0) SymbianOS/7.0s Series60/2.1 Profile/MIDP-2.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia6680/1.0 (4.04.07) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 Configuration/CLDC-1.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 5.0; Series80/2.0 Nokia9300/05.22 Profile/MIDP-2.0 Configuration/CLDC-1.1)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 5.0; Series80/2.0 Nokia9500/4.51 Profile/MIDP-2.0 Configuration/CLDC-1.1)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia6630/1.0 (2.3.129) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 Configuration/CLDC-1.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia7600/2.0 (03.01) Profile/MIDP-1.0 Configuration/CLDC-1.0 (Google WAP Proxy/1.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='NokiaN-Gage/1.0 SymbianOS/6.1 Series60/1.2 Profile/MIDP-1.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia5140/2.0 (3.10) Profile/MIDP-2.0 Configuration/CLDC-1.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia3510i/1.0 (04.44) Profile/MIDP-1.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 6600;452) Opera 6.20 [en-US]') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia7250/1.0 (3.14) Profile/MIDP-1.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia6800/2.0 (4.17) Profile/MIDP-1.0 Configuration/CLDC-1.0 UP.Link/5.1.2.9') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia3650/1.0 SymbianOS/6.1 Series60/1.2 Profile/MIDP-1.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.0; SmartPhone; Symbian OS/1.1.0) Netfront/3.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; O2 Xda 2mini; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; Smartphone; 240x320; SPV C600; OpVer 11.1.3.5)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320; SPV M2000; OpVer 5.31.1.124)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; Smartphone; 176x220; SPV C500; OpVer 4.1.3.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; Smartphone; 176x220)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; Smartphone; 176x220)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; PalmSource/hspr-H102; Blazer/4.0) 16;320x320') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; Windows 95; PalmSource; Blazer 3.0) 16;160x160') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='UPG1 UP/4.0 (compatible; Blazer 1.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible ; MSIE 3.02; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0(compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0(compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; RegKing; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; Windows CE)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; Windows CE)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.51 (compatible; Opera 3.62; EPOC; 640x480)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='EPOC32-WTL/2.0 (VGA) STNC-WTL/2.0(230)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Opera/8.01 (J2ME/MIDP; Opera Mini/1.1.2277/lofi/nordic/int; O2 Xda II; en; U; ssr)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SEC-SGHD410') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 6.0; j2me) ReqwirelessWeb/3.5') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='AU-MIC/1.1.4.0 20722 MMP/2.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SHARP-TQ-GX10i/1.0 Profile/MIDP-1.0 Configuration/CLDC-1.0 UP.Browser/6.1.0.6.1.d.1 (GUI) MMP/1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 5.0; Linux 2.4.18-rmk7-pxa3-embedix armv5tel; 480x640) Opera 6.0 [en]') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SIE-ME45/05 UP.Browser/5.0.1.1.102 (GUI)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SIE-S55/16 UP.Browser/6.1.0.5.c.4 (GUI) MMP/1.0 UP.Link/5.1.2.10') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='ReqwirelessWeb/3.2 S55') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SonyEricssonK610i/R1CB Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Link/6.2.3.15.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Opera/8.01 (J2ME/MIDP; Opera Mini/1.0.1479/HiFi; SonyEricsson P900; no; U; ssr)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SonyEricssonK700i/R2N SEMC-Browser/4.0.1 Profile/MIDP-2.0 Configuration/CLDC-1.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Opera/8.01 (J2ME/MIDP; Opera Mini/1.0.1479/HiFi; SonyEricsson P900; no; U; ssr)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SonyEricssonT200/R101') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.1 (compatible; MSIE5.0; Symbian OS); Opera 6.02 [de]') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SonyEricssonP800/R101 Profile/MIDP-1.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SonyEricssonP900/R101 Profile/MIDP-2.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SonyEricssonT610/R201 Profile/MIDP-1.0 Configuration/CLDC-1.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (PSP (PlayStation Portable); 2.00)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; Sprint:PPC-6700; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='LGE-VX8000/1.0 UP.Browser/6.2.3.1 (GUI) MMP/2.0') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.76 [en] (PalmOS; U; WebPro/3.0.1a; Palm-Cct1)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; PPC; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; MSN Companion 2.0; 800x600; Compaq)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/1.22 (compatible; MSIE 5.01; PalmOS 3.0) EudoraWeb 2.1') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/4.74 [en] (X11; I; ProxiNet)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible; Elaine/3.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; 240x320)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; AvantGo 3.2; ProxiNet; Danger hiptop 1.0)') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nokia') {
		
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='MOT-') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Panasonic') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SAMSUNG-SGH-') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Sharp') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SIE-') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SonyEricsson') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='NEC-') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='SHARP') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Siemens') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='LG') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Sony') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Verizon') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Cingular') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Sprint') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='AT&T') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Nextel') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Palm') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Handspring') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Tungsten') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='HP') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Treo') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Pocket PC') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='T-Mobile') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Erikson') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Orange') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Casio') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Symbian') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Symbol') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='NEC') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Blackberry') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Motorola') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='Samsung') {
	header("location: $mobile"); } elseif(
	$_SERVER['HTTP_USER_AGENT']=='HTC') {
	header("location: $mobile"); }
}
//////////////////////////////////////////

/////////////IDS///////////////////
function IDS_check(){	
	set_include_path(
	get_include_path()
	. PATH_SEPARATOR
	. 'includes'
	);
	
	require_once 'includes/IDS/Init.php';
	$request = array(
	  'REQUEST' => $_REQUEST,
	  'GET' => $_GET,
	  'POST' => $_POST,
	  'COOKIE' => $_COOKIE
	);
	$init = IDS_Init::init('includes/IDS/Config/Config.ini');
	$ids = new IDS_Monitor($request, $init);
	$result = $ids->run();
	
	if (!$result->isEmpty()) {
		return true;
	}
}

// Page Redirect function
function goto($url) {
	header("Location:".$url."");
	exit;
}

// MYSQL INJECTION PROTECTION
function mysql_clean($value) {
	
	global $connect;
	
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
	if( $new_php ) { // PHP v4.3.0 or higher
		// undo any magic quote effects so mysql_real_escape_string can do the work
		if ($magic_quotes_active) {
			$value = stripslashes($value); 
		}
		$value = mysql_real_escape_string(trim(strip_tags($value)), $connect);
		//$value = htmlspecialchars($value,ENT_QUOTES);
	} else { // before PHP v4.3.0
		// if magic quotes aren't already on then add slashes manually
		if( !$magic_quotes_active ) {
			$value = addslashes($value); 
		}
		// if magic quotes are active, then the slashes already exist
	}
	return $value;
}

/////////////////////////////////////////////////////////////////////////////////
///////////////////////// 						        /////////////////////////
/////////////////////////   START LOGIN FUNCTIONS       /////////////////////////
/////////////////////////                               /////////////////////////
/////////////////////////////////////////////////////////////////////////////////

function default_session() {
	$_SESSION['logged'] = false;
	$_SESSION['userid'] = 0;
	$_SESSION['username'] = "";
	$_SESSION['cookie'] = 0;
	$_SESSION['remember'] = false;
}

function logout(){
	$_SESSION['logged'] = false;
	$_SESSION['userid'] = 0;
	$_SESSION['username'] = "";
	$_SESSION['cookie'] = 0;
	$_SESSION['remember'] = false;
}

function login_user() {
	if (isset($_POST['submitlogin'])) {
		
		global $err_msg, $err_username, $err_password;
		
	  //check if the form has a valid session id if not send them back to the empty form
	  if ($_POST['logintoken'] != $_SESSION['logintoken']) {
		  $err_msg .= "<b>Error</b>: WHOOPS! looks like we encountered an error. Clearly we suck! <br/>";
	  } else {
		  
		  if (!isset($_POST['username']) || $_POST['username'] == ""){
			  $err_msg .= "<b>Error:</b> Invalid Username <br />";
			  $err_username = 1;
		  } else {
			  $username = mysql_clean($_POST['username']);
		  }
		  
		  if (!isset($_POST['password']) || $_POST['password'] == ""){
			  $err_msg .= "<b>Error:</b> Invalid Password <br />";
			  $err_password = 1;			  
		  } else {
			  $password = mysql_clean($_POST['password']);
			  $password = md5($password);
		  }
		  
		  unset($remember);
		  if (isset($_POST['rememberme']) ){
			  $remember = 1;
		  }
		  
		  if ($err_username != 1 && $err_password != 1) {
			  authenticate ($username, $password, $remember);
		  }
	  }
	}	
}

function authenticate ($username, $password, $remember) {
	
	global $err_msg, $loginsuccess, $err_activate;
	
	$sql = "SELECT * FROM users WHERE username = '$username' AND pass_hash = '$password' ;";
	$result = mysql_query($sql);
	$user_data = mysql_fetch_array($result);
	
	if (mysql_num_rows($result) == 1) {
		$sql2 = "SELECT active FROM users WHERE username = '$username' ;";
		$result2 = mysql_query($sql2);
		$activated = mysql_fetch_array($result2);
		
		if ( isset($activated['active']) && $activated['active'] == 1 ) {
			$loginsuccess = 1;
			new_session($user_data, $remember);
			return true;
		} else {
			$err_activate = 1;
			logout();
			return false;
		}
		
	} else {
		$err_msg .= "<b>Error:</b> Invalid login credentials. Please try again.<br />";
		logout();
		return false;
	}
}

function new_session ($user_data, $remember, $init = true) {
	
	$_SESSION['userid'] = $user_data['id'];
	$_SESSION['username'] = htmlspecialchars($user_data['username']);
	$_SESSION['cookie'] = $user_data['cookie'];
	//$_SESSION['email'] = $user_data['email'];
	$_SESSION['logged'] = true;
	
	updateCookie($user_data['cookie'], true);
	
	if ($init == true) {
		$session = mysql_clean(session_id());
		$userip = mysql_clean($_SERVER['REMOTE_ADDR']);
		
		$sql = "UPDATE users SET sessionid = '".$session."', ip = '".$userip."' WHERE id =".mysql_clean($user_data['id'])." ;";
		$result = mysql_query($sql);
	}
	
}

function updateCookie($cookie, $save) {
	
	$_SESSION['cookie'] = $cookie;
	$username = mysql_clean($_SESSION['username']);
	$userid = mysql_clean($_SESSION['userid']);
	
	if ($save == true){
		$cookie = md5($username.$userid.time());
		$cookie = mysql_clean($cookie);
		setcookie('hash', $cookie, time()+(60*60*24*7));
		setcookie('user', $username, time()+(60*60*24*7));
		
		$sql = "UPDATE users SET cookie = '".$cookie."' WHERE id = '".$userid."' AND username = '".$username."' ;";
		
		mysql_query($sql);
	}
	
}

function check_session() {
	
	$username = mysql_clean($_SESSION['username']);
	$cookie = mysql_clean($_COOKIE['hash']);
	$session = mysql_clean(session_id());
	$ip = mysql_clean($_SERVER['REMOTE_ADDR']);
	
	$sql = "SELECT id, username, cookie, sessionid, ip FROM users WHERE username = '$username' AND cookie = '$cookie' AND ip = '$ip' AND sessionid = '$session' ;";
	$result = mysql_query($sql);
	$user_data = mysql_fetch_array($result);
	
	  if (mysql_num_rows($result) == 1) {
		  new_session($user_data, false, false);
	  } else {
		  logout();
	  }

}

function check_cookie() {
		
	$username = mysql_clean($_COOKIE['user']);
	$cookie = mysql_clean($_COOKIE['hash']);
	$checkip = mysql_clean($_SERVER['REMOTE_ADDR']);
	
	$sql = "SELECT id, username, cookie, ip FROM users WHERE username = '$username' AND cookie ='$cookie' AND ip = '$checkip' ;";
	$result = mysql_query($sql);
	$user_data = mysql_fetch_array($result);
	
	if (mysql_num_rows($result) == 1) {
		new_session($user_data, true);
	}
}

/////////////////////////////////////////////////////////////////////////////////
///////////////////////// 						        /////////////////////////
/////////////////////////   END LOGIN FUNCTIONS         /////////////////////////
/////////////////////////                               /////////////////////////
/////////////////////////////////////////////////////////////////////////////////

///////////////////////

/////////////////////////////////////////////////////////////////////////////////
///////////////////////// 						        /////////////////////////
/////////////////////////   START SESSION FUNCTIONS     /////////////////////////
/////////////////////////                               /////////////////////////
/////////////////////////////////////////////////////////////////////////////////

function _open() {
  global $_sess_db;
    
  if ($_sess_db = mysql_connect(dbhost, dbuser, dbpass)) {
    return mysql_select_db('sessions', $_sess_db);
  }    
  return FALSE;
}

function _close() {
  global $_sess_db;
    
  return mysql_close($_sess_db);
}

function _read($id) {
  global $_sess_db;

  $id = mysql_clean($id);

  $sql = "SELECT data FROM sessions WHERE  id = '$id'";

  if ($result = mysql_query($sql, $_sess_db)) {
    if (mysql_num_rows($result))
    {
      $record = mysql_fetch_assoc($result);
      return $record['data'];
    }
  }

  return '';
}

function _write($id, $data) {   
  global $_sess_db;

  $access = time();

  $id = mysql_clean($id);
  $access = mysql_clean($access);
  $data = mysql_clean($data);

  $sql = "REPLACE INTO sessions VALUES ('$id', '$access', '$data')";

  return mysql_query($sql, $_sess_db);
}

function _destroy($id) {
  global $_sess_db;
    
  $id = mysql_clean($id);

  $sql = "DELETE FROM sessions WHERE id = '$id'";

  return mysql_query($sql, $_sess_db);
}

function _clean($max) {
  global $_sess_db;
    
  $old = time() - $max;
  $old = mysql_clean($old);

  $sql = "DELETE FROM sessions WHERE access < '$old'";

  return mysql_query($sql, $_sess_db);
}
	
////////////////////////////////////////////////////////////////////////////////
///////////////////////// 			   			      //////////////////////////
/////////////////////////   END SESSION FUNCTIONS     //////////////////////////
/////////////////////////                             //////////////////////////
////////////////////////////////////////////////////////////////////////////////

// Hits and tip auto format
function table_hints($message) {
	echo
	 "<table width=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
      <tr>
        <td><img src=\"images/c_topleft.png\" width=\"4\" height=\"4\" /></td>
        <td width=\"100%\" bgcolor=\"#e2eaf9\"></td>
        <td><img src=\"images/c_topright.png\" width=\"4\" height=\"4\" /></td>
      </tr>
      <tr>
        <td bgcolor=\"#e2eaf9\">&nbsp;</td>
        <td bgcolor=\"#e2eaf9\"><div class=\"description\">".$message."</div></td>
        <td bgcolor=\"#e2eaf9\">&nbsp;</td>
      </tr>
      <tr>
        <td><img src=\"images/c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
        <td bgcolor=\"#e2eaf9\"></td>
        <td><img src=\"images/c_bottomright.png\" width=\"4\" height=\"4\" /></td>
      </tr>
    </table>";
}

// Function to determine ESRB IMAGES
function esrbvalue($esrbv){
	
	$picwidth = 105;
	$picheight = 158;
	
	if ($esrbv == 1){
		echo "<img src=\"images/esrb/earlychildhood.png\" width=\"$picwidth\" height=\"$picheight\" />";
	} else if ($esrbv == 2) {
		echo "<img src=\"images/esrb/everyone.png\" width=\"$picwidth\" height=\"$picheight\" />";
	} else if ($esrbv == 3) {
		echo "<img src=\"images/esrb/everyone10.png\" width=\"$picwidth\" height=\"$picheight\" />";
	} else if ($esrbv == 4) {
		echo "<img src=\"images/esrb/teen.png\" width=\"$picwidth\" height=\"$picheight\" />";
	} else if ($esrbv == 5) {
		echo "<img src=\"images/esrb/mature.png\" width=\"$picwidth\" height=\"$picheight\" />";
	} else if ($esrbv == 6) {
		echo "<img src=\"images/esrb/adult.png\" width=\"$picwidth\" height=\"$picheight\" />";
	} else if ($esrbv == 7) {
		echo "<img src=\"images/esrb/rp.png\" width=\"$picwidth\" height=\"$picheight\" />";
	} else {
		echo "<img src=\"images/esrb/rp.png\" width=\"$picwidth\" height=\"$picheight\" />";
	}
}

// Function to determine ESRB NAMES
function esrbvalue_list($esrbv){
	if ($esrbv == 1){
		echo "Earlychildhood";
	} else if ($esrbv == 2) {
		echo "Everyone";
	} else if ($esrbv == 3) {
		echo "Everyone 10+";
	} else if ($esrbv == 4) {
		echo "Teen";
	} else if ($esrbv == 5) {
		echo "Mature";
	} else if ($esrbv == 6) {
		echo "Adult 18+";
	} else if ($esrbv == 7) {
		echo "Rating Pending";
	} else {
		echo "Rating Pending";
	}
}

// Error icons
function error(){
	echo "<img src=\"images/error.png\" width=\"18\" height=\"18\" />";
}

// paginate function
function pagination($sql,$numrows) {
	
	global $query, $rows, $page, $last;
	
	
	$query = mysql_query($sql) or die("Error connecting to database");
	$rows = mysql_num_rows($query);
	$last = ceil($rows/$numrows);
	
	if (isset($_GET['page'])){
		$page = mysql_clean($_GET['page']);
	} else {
		$page = 1;
	}
	
	$page = (int)$page;	
	
	if ($page > $last){
		$page = $last;
	}
	if ($page < 1){
		$page=1;
	}
	
	$limit = 'LIMIT ' .($page - 1) * $numrows .',' .$numrows. ';';	
	$limit = mysql_clean($limit);
	$query = mysql_query($sql.$limit);
	
	return true;
	
}

// DISPLAYING CONSOLES 
function displayconsoles(){
	
	global $id, $conslogo;
	
	$getcons = mysql_fetch_array(mysql_query("SELECT consoles FROM games WHERE id = ".mysql_clean($id).";"));
	$transcons = explode(",",$getcons['consoles']);
	foreach ($transcons as $logo) {
		$conslogo = mysql_fetch_array(mysql_query("SELECT * FROM consoles WHERE consoleID = ".mysql_clean($logo).";"));
		echo "<img src=\"".$conslogo['console_logo']."\" border=\"0\" alt=\"".mysql_clean($conslogo['console_name'])."\" />&nbsp;";
	}
}

function doesitexist($variable){
	if (isset($variable) && $variable != "" && $variable != "0.00"){
		return "<b>$ ".$variable."</b>";
	} else {
		return "<span style =\"color:#999999;\">N/A</span>";
	}
}
					   

function displayconsoles_intable(){
	
	global $id, $conslogo;
	
	$getcons = mysql_fetch_array(mysql_query("SELECT consoles FROM games WHERE id = ".mysql_clean($id).";"));
	$transcons = explode(",",$getcons['consoles']);
	
	foreach ($transcons as $logo) {
		$conslogo = mysql_fetch_array(mysql_query("SELECT * FROM consoles WHERE consoleID = ".mysql_clean($logo).";"));
		
		$gettiv = mysql_fetch_array(mysql_query("SELECT * FROM tivs WHERE gameID = ".mysql_clean($id)." AND consoleID = ".mysql_clean($logo)." ORDER BY id DESC LIMIT 0,1;"));
		
		echo "<tr class=\"games2\"><td><b>".$conslogo['name']."</b></td><td>".doesitexist($gettiv['fs'])."</td><td>".doesitexist($gettiv['eb'])."</td><td>".doesitexist($gettiv['bb'])."</td></tr>";
	}
}

function checkconsoles(){
	
	global $id, $pcc, $xbox360c, $ps3c, $wiic, $xboxc, $ps2c, $gcc, $dsc, $pspc;	
	
	$getcons = mysql_fetch_array(mysql_query("SELECT consoles FROM games WHERE id = ".mysql_clean($id).";"));
	$transcons = explode(",",$getcons['consoles']);
	foreach ($transcons as $logo) {
		
		if ($logo == 1){
			$pcc = 1;
		}

		if ($logo == 2){
			$xbox360c = 1;
		}
		
		if ($logo == 3){
			$ps3c = 1;
		}

		if ($logo == 4){
			$wiic = 1;
		}
		
		if ($logo == 5){
			$xboxc = 1;
		}
		
		if ($logo == 6){
			$ps2c = 1;
		}
		
		if ($logo == 7){
			$gcc = 1;
		}
		
		if ($logo == 8){
			$dsc = 1;
		}
		
		if ($logo == 9){
			$pspc = 1;
		}
	}
}

// display links in chart area
function displayconsoles_chart(){
	
	global $id, $conslogo;
	
	$getcons = mysql_fetch_array(mysql_query("SELECT consoles FROM games WHERE id = ".mysql_clean($id).";"));
	$transcons = explode(",",$getcons['consoles']);
	
	echo "<table border=\"0\" style=\"margin-left:3px;\">
		<tr valign=\"middle\"><td><img src=\"images/platformbutton.png\" border=\"0\" /></td><td>&nbsp;</td>";
	
	foreach ($transcons as $logo) {
		$conslogo = mysql_fetch_array(mysql_query("SELECT * FROM consoles WHERE consoleID = ".mysql_clean($logo).";"));
		
		if (isset($_GET['s']) && $_GET['s'] != "" && is_numeric($_GET['s']) ){
			
			if ($_GET['c'] == $logo) {
				echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$logo."&s=".$_GET['s']."#charts\" style=\"color:#336600;\">".$conslogo['name']."</a></td><td>&nbsp;</td>";
			} else {
				echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$logo."&s=".$_GET['s']."#charts\" style=\"color:#95b84d;\">".$conslogo['name']."</a></td><td>&nbsp;</td>";
			}
			
		} else {
			
			if ($_GET['c'] == $logo) {
				echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$logo."#charts\" style=\"color:#336600;\">".$conslogo['name']."</a></td><td>&nbsp;</td>";
			} else {
				echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$logo."#charts\" style=\"color:#95b84d;\">".$conslogo['name']."</a></td><td>&nbsp;</td>";
			}
			
		}
		
	}
	
	echo "</tr></table>
	<table border=\"0\" style=\"margin-left:3px;\">
		<tr valign=\"middle\">
			<td><img src=\"images/storebutton.png\" border=\"0\" /></td><td width=\"25\">&nbsp;</td>";
			
			if (isset($_GET['c']) && $_GET['c'] != "" && isset($_GET['s']) && $_GET['s'] != "") {
				
				switch ($_GET['c']) {
					
					case 1:
					case 2:
					case 3:
					case 4:
					case 5:
					case 6:
					case 7:
					case 8:
					case 9:
					
					switch ($_GET['s']) {
						
						case 0:
						echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#336600;\">All</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
						  </tr>";
						break;
						
						case 1:
						echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#95b84d;\">All</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#336600;\">Futureshop</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
						  </tr>";
						break;
						
						case 2:
						echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#95b84d;\">All</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#336600;\">EB Games</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
						  </tr>";
						break;
						
						case 3:
						echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#95b84d;\">All</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#336600;\">Blockbuster</a></td><td>&nbsp;</td>
						  </tr>";
						break;
						
						default:
						echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#336600;\">All</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
							  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
						  </tr>";
						break;
					
					}
					
					break;
					
					default:
					echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#336600;\">All</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
					  </tr>";
					 break;
					
				}
				
			} else {
				
			
				switch ($_GET['s']) {
					  
					case 0:
					echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#336600;\">All</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
					  </tr>";
					break;
					
					case 1:
					echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#95b84d;\">All</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#336600;\">Futureshop</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
					  </tr>";
					break;
					
					case 2:
					echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#95b84d;\">All</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#336600;\">EB Games</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
					  </tr>";
					break;
					
					case 3:
					echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#95b84d;\">All</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#336600;\">Blockbuster</a></td><td>&nbsp;</td>
					  </tr>";
					break;
					
					default:
					echo "<td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=0#charts\" style=\"color:#336600;\">All</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=1#charts\" style=\"color:#95b84d;\">Futureshop</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=2#charts\" style=\"color:#95b84d;\">EB Games</a></td><td>&nbsp;</td>
						  <td><a href=\"index.php?action=game&gameid=".$id."&c=".$_GET['c']."&s=3#charts\" style=\"color:#95b84d;\">Blockbuster</a></td><td>&nbsp;</td>
					  </tr>";
					break;
				
				}
				
			}			
	
	echo "</table><br />";
}

// POLLING FUNCTION
function votingallow($id){
	
	if (isset($_SESSION['userid']) && $_SESSION['userid'] != 0 && $_SESSION['logged'] == true) {
	$votequery = mysql_query("SELECT * FROM polls WHERE userID = ".mysql_clean($_SESSION['userid'])." AND gameID = ".mysql_clean($id) ) or die ("Error connecting to database");
	
		if (mysql_num_rows($votequery) > 0) {
			$cannotvote = 1;
		} else {
			$cannotvote = 0;
		}
		
		if ($cannotvote != 1) {
			if (isset($_POST['like'])) {
				mysql_query("INSERT INTO polls(gameID,lik,userID) VALUES(".mysql_clean($id).",1, ".mysql_clean($_SESSION['userid']).");");
				$cannotvote = 1;
			}
			
			if (isset($_POST['dislike'])) {
				mysql_query("INSERT INTO polls(gameID,dislike,userID) VALUES(".mysql_clean($id).",1, ".mysql_clean($_SESSION['userid']).");");
				$cannotvote = 1;
			}
		}
	} else {
		$cannotvote = 1;
	}
	
	return $cannotvote;	
}

function polling($id){
	
	$liked = mysql_num_rows(mysql_query("SELECT * FROM polls WHERE gameID = ".mysql_clean($id)." AND lik = 1;"));
	$disliked = mysql_num_rows(mysql_query("SELECT * FROM polls WHERE gameID = ".mysql_clean($id)." AND dislike = 1;"));
	$total = mysql_num_rows(mysql_query("SELECT * FROM polls WHERE gameID = ".mysql_clean($id).""));
	
	$gamerating = ceil(($liked/$total)*100);
	$gamerating = mysql_clean($gamerating);
	
	mysql_query("UPDATE games SET rating = '".$gamerating."' WHERE id = ".mysql_clean($id)." LIMIT 1;");
	
	return $gamerating;
}

// time interpretation 
function unix_todate($timestamp, $format = 'd M Y') {
   return date($format, $timestamp);
}

function time_since($original) {
    // array of time period chunks
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'months'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hr'),
        array(60 , 'min'),
    );
    
    $today = time(); /* Current unix time  */
    $since = $today - $original;
    
    // $j saves performing the count function each time around the loop
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        
        // finding the biggest chunk (if the chunk fits, break)
        if (($count = floor($since / $seconds)) != 0) {
            // DEBUG print "<!-- It's $name -->\n";
            break;
        }
    }
    
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    
    if ($i + 1 < $j) {
        // now getting the second item
        $seconds2 = $chunks[$i + 1][0];
        $name2 = $chunks[$i + 1][1];
        
        // add second item if it's greater than 0
        if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
            $print .= ($count2 == 1) ? ' 1 '.$name2 : " $count2 {$name2}s";
        }
    }
    return $print;
}

// Email Validation function
function validateEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if
(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
//      if ($isValid && !(checkdnsrr($domain,"MX") || 
// (checkdnsrr($domain,"A"))))
//      {
//         // domain not found in DNS
//         $isValid = false;
//      }
   }
   return $isValid;
}

// Key Generator
function randomValue($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}

function randomKey($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= randomValue($num);
   }
  }
return $rand_id;
}

// link checker
function is_url_valid($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10); //follow up to 10 redirections - avoids loops
	$data = curl_exec($ch);
	curl_close($ch);
	preg_match_all("/HTTP\/1\.[1|0]\s(\d{3})/",$data,$matches);
	$code = end($matches[1]);
	if(!$data) {
	  return false;
	} else {
	  if($code==200) {
		return true;
	  } elseif($code==404) {
		 return false;
	  }
	}
}

// imagefilewriter
function writeimagefile($nameofgame){
	// define the filename extensions you're allowing
	define('ALLOWED_FILENAMES', 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG');
	// define a directory the webserver can write to
	define('IMAGE_DIR', 'images/games');
	
	// check against a regexp for an actual http url and for a valid filename, also extract that filename using a submatch (see PHP's regexp docs to understand this)
	if(!preg_match('#^http://upload.wikimedia.org/.*(\.('.ALLOWED_FILENAMES.'))$#', $_POST['image_url'], $m)) {
	  die('Invalid url given');
	}
	
	// try getting the image
	if(!$img = file_get_contents($_POST['image_url'])) {
	  die('Getting that file failed');
	}
	
	// try writing the file with the original filename -- note that this will overwrite any existing filename in the same directory -- that's up to you to check for
	if(!$f = fopen(IMAGE_DIR.'/'.$nameofgame.$m[1], 'w')) {
	  die('Opening file for writing failed');
	}
	
	if (fwrite($f, $img) === FALSE) {
	  die('Could not write to the file');
	}
	
	fclose($f);  
	
	$sourcedir = IMAGE_DIR."/".$nameofgame.$m[1];
	
	return $sourcedir;
}

?>
