<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
      <meta name="author" content="nilo.pamungkas" />
    <style type="text/css">
      html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
      a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
      a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
      div.comment { display:none }
      table { border-collapse:collapse; page-break-after:always }
      .gridlines td { border:1px dotted black }
      .gridlines th { border:1px dotted black }
      .b { text-align:center }
      .e { text-align:center }
      .f { text-align:right }
      .inlineStr { text-align:left }
      .n { text-align:right }
      .s { text-align:left }
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style1 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style1 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style2 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      th.style2 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      td.style3 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style3 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style4 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style4 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style5 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style5 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      th.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      td.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      th.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      td.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      th.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      td.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      th.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#BDD6EE }
      td.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style12 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style12 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style14 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style14 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style15 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style15 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style18 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style18 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style19 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style19 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style20 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:#BDD6EE }
      th.style20 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:#BDD6EE }
      td.style21 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:white }
      th.style21 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:white }
      td.style22 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:white }
      th.style22 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:white }
      td.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:white }
      th.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:white }
      td.style24 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFF00 }
      th.style24 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFF00 }
      td.style25 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:#F2F2F2 }
      th.style25 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:#F2F2F2 }
      td.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style27 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style27 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style28 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style28 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      td.style32 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      th.style32 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#7030A0; font-family:'Calibri'; font-size:11pt; background-color:#FFFF00 }
      table.sheet0 col.col0 { width:25.07777749pt }
      table.sheet0 col.col1 { width:13.5555554pt }
      table.sheet0 col.col2 { width:31.17777742pt }
      table.sheet0 col.col3 { width:60.9999993pt }
      table.sheet0 col.col4 { width:60.9999993pt }
      table.sheet0 col.col5 { width:60.9999993pt }
      table.sheet0 col.col6 { width:60.9999993pt }
      table.sheet0 col.col7 { width:60.9999993pt }
      table.sheet0 col.col8 { width:60.9999993pt }
      table.sheet0 col.col9 { width:8.81111101pt }
      table.sheet0 col.col10 { width:25.07777749pt }
      table.sheet0 col.col11 { width:13.5555554pt }
      table.sheet0 col.col12 { width:31.17777742pt }
      table.sheet0 col.col13 { width:60.9999993pt }
      table.sheet0 col.col14 { width:66.42222146pt }
      table.sheet0 col.col15 { width:64.38888815pt }
      table.sheet0 col.col16 { width:70.48888808pt }
      table.sheet0 col.col17 { width:60.9999993pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row14 { height:22.5pt }
      table.sheet0 tr.row21 { height:22.5pt }
      table.sheet0 tr.row28 { height:22.5pt }
      table.sheet0 tr.row35 { height:22.5pt }
      table.sheet0 tr.row42 { height:22.5pt }
      table.sheet0 tr.row49 { height:22.5pt }
      table.sheet0 tr.row56 { height:22.5pt }
      table.sheet0 tr.row63 { height:22.5pt }
      table.sheet0 tr.row70 { height:22.5pt }
      table.sheet0 tr.row77 { height:22.5pt }
      table.sheet0 tr.row84 { height:22.5pt }
      table.sheet0 tr.row91 { height:22.5pt }
      table.sheet0 tr.row97 { height:18.75pt }
      table.sheet0 tr.row112 { height:18.75pt }
      table.sheet0 tr.row127 { height:18.75pt }
    </style>
  </head>

  <body>
<style>
@page { margin-left: 0.7in; margin-right: 0.7in; margin-top: 0.75in; margin-bottom: 0.75in; }
body { margin-left: 0.7in; margin-right: 0.7in; margin-top: 0.75in; margin-bottom: 0.75in; }
</style>
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <col class="col12">
        <col class="col13">
        <col class="col14">
        <col class="col15">
        <col class="col16">
        <col class="col17">
        <tbody>
          <!-- LAPORAN PERTAHUN -->
              <!-- RUMUS BRUTO DOMESTIC -->
              <?php 
                  ini_set("error_reporting", 1);
                  session_start();
                  $thn = $_GET['thn'];
                  require_once "koneksi.php";
                  $localjan = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '1' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localjan = db2_fetch_assoc($localjan);
                  $localfeb = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localfeb = db2_fetch_assoc($localfeb);
                  $localmar = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '3' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localmar = db2_fetch_assoc($localmar);
                  $localapr = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '4' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localapr = db2_fetch_assoc($localapr);
                  $localmei = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '5' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localmei = db2_fetch_assoc($localmei);
                  $localjun = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '6' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localjun = db2_fetch_assoc($localjun);
                  $localjul = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '7' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localjul = db2_fetch_assoc($localjul);
                  $localags = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '8' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localags = db2_fetch_assoc($localags);
                  $localsep = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '9' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localsep = db2_fetch_assoc($localsep);
                  $localokt = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '10' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localokt = db2_fetch_assoc($localokt);
                  $localnov = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '11' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localnov = db2_fetch_assoc($localnov);
                  $localdes = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '12' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_localdes = db2_fetch_assoc($localdes);
              ?>

              <!-- RUMUS BRUTO EXPORT -->
              <?php 
                  ini_set("error_reporting", 1);
                  session_start();
                  require_once "koneksi.php";
                  $expjan = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '1' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expjan = db2_fetch_assoc($expjan);
                  $expfeb = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expfeb = db2_fetch_assoc($expfeb);
                  $expmar = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '3' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expmar = db2_fetch_assoc($expmar);
                  $expapr = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '4' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expapr = db2_fetch_assoc($expapr);
                  $expmei = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '5' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expmei = db2_fetch_assoc($expmei);
                  $expjun = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '6' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expjun = db2_fetch_assoc($expjun);
                  $expjul = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '7' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expjul = db2_fetch_assoc($expjul);
                  $expags = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '8' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expags = db2_fetch_assoc($expags);
                  $expsep = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '9' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expsep = db2_fetch_assoc($expsep);
                  $expokt = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '10' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expokt = db2_fetch_assoc($expokt);
                  $expnov = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '11' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expnov = db2_fetch_assoc($expnov);
                  $expdes = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '12' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_expdes = db2_fetch_assoc($expdes);
              ?>
              
              <!-- RUMUS F/K (Flat Knit) KERAH -->
              <?php 
                  ini_set("error_reporting", 1);
                  session_start();
                  require_once "koneksi.php";
                  $fkjan = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '1' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkjan = db2_fetch_assoc($fkjan);
                  $fkfeb = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkfeb = db2_fetch_assoc($fkfeb);
                  $fkmar = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '3' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkmar = db2_fetch_assoc($fkmar);
                  $fkapr = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '4' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkapr = db2_fetch_assoc($fkapr);
                  $fkmei = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '5' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkmei = db2_fetch_assoc($fkmei);
                  $fkjun = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '6' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkjun = db2_fetch_assoc($fkjun);
                  $fkjul = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '7' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkjul = db2_fetch_assoc($fkjul);
                  $fkags = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '8' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkags = db2_fetch_assoc($fkags);
                  $fksep = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '9' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fksep = db2_fetch_assoc($fksep);
                  $fkokt = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '10' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkokt = db2_fetch_assoc($fkokt);
                  $fknov = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '11' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fknov = db2_fetch_assoc($fknov);
                  $fkdes = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'FKF' AND MONTH ( s.REQUIREDDUEDATE  ) = '12' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_fkdes = db2_fetch_assoc($fkdes);
              ?>
              
              <!-- RUMUS BOOKING -->
              <?php 
                  ini_set("error_reporting", 1);
                  session_start();
                  require_once "koneksi.php";
                  $opnjan = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '1' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnjan = db2_fetch_assoc($opnjan);
                  $opnfeb = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnfeb = db2_fetch_assoc($opnfeb);
                  $opnmar = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '3' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnmar = db2_fetch_assoc($opnmar);
                  $opnapr = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '4' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnapr = db2_fetch_assoc($opnapr);
                  $opnmei = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '5' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnmei = db2_fetch_assoc($opnmei);
                  $opnjun = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '6' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnjun = db2_fetch_assoc($opnjun);
                  $opnjul = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '7' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnjul = db2_fetch_assoc($opnjul);
                  $opnags = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '8' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnags = db2_fetch_assoc($opnags);
                  $opnsep = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '9' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnsep = db2_fetch_assoc($opnsep);
                  $opnokt = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '10' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnokt = db2_fetch_assoc($opnokt);
                  $opnnov = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '11' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opnnov = db2_fetch_assoc($opnnov);
                  $opndes = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '12' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_opndes = db2_fetch_assoc($opndes);
              ?>

              <!-- RUMUS JASA -->
              <?php 
                  ini_set("error_reporting", 1);
                  session_start();
                  require_once "koneksi.php";
                  $jasajan = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '1' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasajan = db2_fetch_assoc($jasajan);
                  $jasafeb = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasafeb = db2_fetch_assoc($jasafeb);
                  $jasamar = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasamar = db2_fetch_assoc($jasamar);
                  $jasaapr = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasaapr = db2_fetch_assoc($jasaapr);
                  $jasamei = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasamei = db2_fetch_assoc($jasamei);
                  $jasajun = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasajun = db2_fetch_assoc($jasajun);
                  $jasajul = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasajul = db2_fetch_assoc($jasajul);
                  $jasaags = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasaags = db2_fetch_assoc($jasaags);
                  $jasasep = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasasep = db2_fetch_assoc($jasasep);
                  $jasaokt = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasaokt = db2_fetch_assoc($jasaokt);
                  $jasanov = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasanov = db2_fetch_assoc($jasanov);
                  $jasades = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE ) = '$thn' AND p.ORIGDLVSALORDLINESALORDCNTCOD = 'DOMESTIC' OR p.ORIGDLVSALORDLINESALORDCNTCOD = 'EXPORT' AND s.TEMPLATECODE = 'CWD' OR s.TEMPLATECODE = 'CWE'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_jasades = db2_fetch_assoc($jasades);
              ?>

              <!-- RUMUS PRINTING -->
              <?php 
                  ini_set("error_reporting", 1);
                  session_start();
                  $thn = $_GET['thn'];
                  require_once "koneksi.php";
                  $printingjan = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '1' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingjan = db2_fetch_assoc($printingjan);
                  $printingfeb = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '2' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingfeb = db2_fetch_assoc($printingfeb);
                  $printingmar = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '3' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingmar = db2_fetch_assoc($printingmar);
                  $printingapr = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '4' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingapr = db2_fetch_assoc($printingapr);
                  $printingmei = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '5' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingmei = db2_fetch_assoc($printingmei);
                  $printingjun = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '6' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingjun = db2_fetch_assoc($printingjun);
                  $printingjul = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '7' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingjul = db2_fetch_assoc($printingjul);
                  $printingags = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '8' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingags = db2_fetch_assoc($printingags);
                  $printingsep = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '9' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingsep = db2_fetch_assoc($printingsep);
                  $printingokt = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '10' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingokt = db2_fetch_assoc($printingokt);
                  $printingnov = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '11' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingnov = db2_fetch_assoc($printingnov);
                  $printingdes = db2_exec($conn1, "SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE MONTH ( s.REQUIREDDUEDATE  ) = '12' AND YEAR ( s.REQUIREDDUEDATE  ) = '$thn' AND p.SUBCODE08 IS NOT NULL AND NOT p.SUBCODE08 = '-' AND NOT p.SUBCODE08 = '          '", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_printingdes = db2_fetch_assoc($printingdes);
              ?>

              <tr class="row0">
                  <td class="column0 style7 s style9" colspan="3">BULAN</td>
                  <td class="column3 style2 s" title="Production Demand: Bruto, KGF, DOMESTIC.">LOKAL</td>
                  <td class="column4 style2 s">%LOKAL</td>
                  <td class="column5 style2 s" title="Production Demand: Bruto, KGF, EXPORT.">EXPORT</td>
                  <td class="column6 style2 s">%EXPORT</td>
                  <td class="column7 style2 s" title="Production Demand: Bruto, KFK, DOMESTIC EXPORT.">F/K</td>
                  <td class="column8 style7 s style9" colspan="2">TOTAL</td>
                  <td class="column10 style17 s style19" colspan="3" title="Production Demand: Bruto, KGF, OPEN.">BOOKING</td>
                  <td class="column13 style2 s">JASA</td>
                  <td class="column14 style2 s">PRINTING</td>
                  <td class="column15 style2 s">KIRIM</td>
                  <td class="column16 style2 s">ON TIME</td>
              </tr>
              <tr class="row1">
                  <td class="column0 style11 s style13" colspan="3">JANUARI</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localjan['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokaljan</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expjan['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expjan</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkjan['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localjan['TOTAL']+$rowdb2_expjan['TOTAL']+$rowdb2_fkjan['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnjan['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasajan['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingjan['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row2">
                  <td class="column0 style11 s style13" colspan="3">FEBRUARI</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localfeb['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalfeb</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expfeb['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expfeb</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkfeb['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localfeb['TOTAL']+$rowdb2_expfeb['TOTAL']+$rowdb2_fkfeb['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnfeb['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasafeb['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingfeb['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row3">
                  <td class="column0 style11 s style13" colspan="3">MARET</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localmar['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalmar</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expmar['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expmar</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkmar['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localmar['TOTAL']+$rowdb2_expmar['TOTAL']+$rowdb2_fkmar['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnmar['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasamar['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingmar['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row4">
                  <td class="column0 style11 s style13" colspan="3">APRIL</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localapr['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalapr</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expapr['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expapr</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkapr['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localapr['TOTAL']+$rowdb2_expapr['TOTAL']+$rowdb2_fkapr['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnapr['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasaapr['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingapr['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row5">
                  <td class="column0 style11 s style13" colspan="3">MEI</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localmei['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalmei</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expmei['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expmei</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkmei['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localmei['TOTAL']+$rowdb2_expmei['TOTAL']+$rowdb2_fkmei['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnmei['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasamei['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingmei['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row6">
                  <td class="column0 style11 s style13" colspan="3">JUNI</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localjun['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokaljun</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expjun['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expjun</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkjun['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localjun['TOTAL']+$rowdb2_expjun['TOTAL']+$rowdb2_fkjun['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnjun['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasajun['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingjun['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row7">
                  <td class="column0 style11 s style13" colspan="3">JULI</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localjul['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokaljul</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expjul['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expjul</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkjul['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localjul['TOTAL']+$rowdb2_expjul['TOTAL']+$rowdb2_fkjul['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnjul['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasajul['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingjul['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row8">
                  <td class="column0 style11 s style13" colspan="3">AGUSTUS</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localags['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalags</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expags['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expags</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkags['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localags['TOTAL']+$rowdb2_expags['TOTAL']+$rowdb2_fkags['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnags['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasaags['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingags['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row9">
                  <td class="column0 style11 s style13" colspan="3">SEPTEMBER</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localsep['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalsep</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expsep['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expsep</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fksep['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localsep['TOTAL']+$rowdb2_expsep['TOTAL']+$rowdb2_fksep['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnsep['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasasep['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingsep['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row10">
                  <td class="column0 style11 s style13" colspan="3">OKTOBER</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localokt['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalokt</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expokt['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expokt</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkokt['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localokt['TOTAL']+$rowdb2_expokt['TOTAL']+$rowdb2_fkokt['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnokt['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasaokt['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingokt['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row11">
                  <td class="column0 style11 s style13" colspan="3">NOPEMBER</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localnov['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokalnov</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expnov['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expnov</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fknov['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localnov['TOTAL']+$rowdb2_expnov['TOTAL']+$rowdb2_fknov['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opnnov['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasanov['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingnov['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
              </tr>
              <tr class="row12">
                  <td class="column0 style11 s style13" colspan="3">DESEMBER</td>
                  <td class="column3 style4 null"><?= number_format($rowdb2_localdes['TOTAL'],0); ?></td>
                  <td class="column4 style4 null">%lokaldes</td>
                  <td class="column5 style4 null"><?= number_format($rowdb2_expdes['TOTAL'],0); ?></td>
                  <td class="column6 style4 null">%expdes</td>
                  <td class="column7 style4 null"><?= number_format($rowdb2_fkdes['TOTAL'],0); ?></td>
                  <td class="column8 style7 null style9" colspan="2"><?= number_format($rowdb2_localdes['TOTAL']+$rowdb2_expdes['TOTAL']+$rowdb2_fkdes['TOTAL'],0); ?></td>
                  <td class="column10 style17 null style19" colspan="3"><?= number_format($rowdb2_opndes['TOTAL'],0); ?></td>
                  <td class="column13 style4 null"><?= number_format($rowdb2_jasades['TOTAL'], 0); ?></td>
                  <td class="column14 style4 null"><?= number_format($rowdb2_printingdes['TOTAL'], 0); ?></td>
                  <td class="column15 style4 null"></td>
                  <td class="column16 style4 null"></td>
                  
              </tr>
          <!-- LAPORAN PERTAHUN -->

          <!-- LAPORAN PERMINGGU BRUTO, AKJ-->
              <!-- JANUARI -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIjan   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-01-01' AND '$thn-01-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIjan   = db2_fetch_assoc($brto_mingguIjan);
                      $brto_mingguIIjan  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-01-08' AND '$thn-01-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIjan  = db2_fetch_assoc($brto_mingguIIjan);
                      $brto_mingguIIIjan = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-01-15' AND '$thn-01-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIjan = db2_fetch_assoc($brto_mingguIIIjan);
                      $brto_mingguIVjan  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-01-22' AND '$thn-01-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVjan  = db2_fetch_assoc($brto_mingguIVjan);
                      // AKJ
                      $akj_mingguIjan   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-01' AND '$thn-01-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIjan   = db2_fetch_assoc($akj_mingguIjan);
                      $akj_mingguIIjan  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-08' AND '$thn-01-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIjan  = db2_fetch_assoc($akj_mingguIIjan);
                      $akj_mingguIIIjan = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-15' AND '$thn-01-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIjan = db2_fetch_assoc($akj_mingguIIIjan);
                      $akj_mingguIVjan  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-22' AND '$thn-01-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVjan  = db2_fetch_assoc($akj_mingguIVjan);
                  ?> 
                  <tr class="row14">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row15">
                      <td class="column0 style4 s">JAN</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIjan['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIjan['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JAN</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row16">
                      <td class="column0 style4 s">JAN</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIjan['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIjan['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JAN</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row17">
                      <td class="column0 style4 s">JAN</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIjan['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIjan['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JAN</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row18">
                      <td class="column0 style4 s">JAN</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVjan['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVjan['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JAN</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row19">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIjan['TOTAL']+$rowdb2_brto_mingguIIjan['TOTAL']+$rowdb2_brto_mingguIIIjan['TOTAL']+$rowdb2_brto_mingguIVjan['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIjan['TOTAL']+$rowdb2_akj_mingguIIjan['TOTAL']+$rowdb2_akj_mingguIIIjan['TOTAL']+$rowdb2_akj_mingguIVjan['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr> 
              
              <!-- FEBRUARI -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIfeb   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-02-01' AND '$thn-02-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIfeb   = db2_fetch_assoc($brto_mingguIfeb);
                      $brto_mingguIIfeb  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-02-08' AND '$thn-02-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIfeb  = db2_fetch_assoc($brto_mingguIIfeb);
                      $brto_mingguIIIfeb = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-02-15' AND '$thn-02-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIfeb = db2_fetch_assoc($brto_mingguIIIfeb);
                      $brto_mingguIVfeb  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-02-22' AND '$thn-02-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVfeb  = db2_fetch_assoc($brto_mingguIVfeb);
                      
                      // AKJ
                      $akj_mingguIfeb   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-01' AND '$thn-02-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIfeb   = db2_fetch_assoc($akj_mingguIfeb);
                      $akj_mingguIIfeb  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-08' AND '$thn-02-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIfeb  = db2_fetch_assoc($akj_mingguIIfeb);
                      $akj_mingguIIIfeb = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-15' AND '$thn-02-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIfeb = db2_fetch_assoc($akj_mingguIIIfeb);
                      $akj_mingguIVfeb  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-22' AND '$thn-02-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVfeb  = db2_fetch_assoc($akj_mingguIVfeb);
                  ?>
                  <tr class="row21">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                      
                  </tr>
                  <tr class="row22">
                      <td class="column0 style4 s">FEB</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIfeb['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIfeb['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">FEB</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row23">
                      <td class="column0 style4 s">FEB</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIfeb['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIfeb['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">FEB</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row24">
                      <td class="column0 style4 s">FEB</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIfeb['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIfeb['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">FEB</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row25">
                      <td class="column0 style4 s">FEB</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVfeb['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVfeb['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">FEB</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row26">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIfeb['TOTAL']+$rowdb2_brto_mingguIIfeb['TOTAL']+$rowdb2_brto_mingguIIIfeb['TOTAL']+$rowdb2_brto_mingguIVfeb['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIfeb['TOTAL']+$rowdb2_akj_mingguIIfeb['TOTAL']+$rowdb2_akj_mingguIIIfeb['TOTAL']+$rowdb2_akj_mingguIVfeb['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- MARET -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguImar   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-03-01' AND '$thn-03-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguImar   = db2_fetch_assoc($brto_mingguImar);
                      $brto_mingguIImar  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-03-08' AND '$thn-03-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIImar  = db2_fetch_assoc($brto_mingguIImar);
                      $brto_mingguIIImar = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-03-15' AND '$thn-03-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIImar = db2_fetch_assoc($brto_mingguIIImar);
                      $brto_mingguIVmar  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-03-22' AND '$thn-03-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVmar  = db2_fetch_assoc($brto_mingguIVmar);
                      // AKJ
                      $akj_mingguImar   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-01'  AND '$thn-03-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguImar   = db2_fetch_assoc($akj_mingguImar);
                      $akj_mingguIImar  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-08'  AND '$thn-03-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIImar  = db2_fetch_assoc($akj_mingguIImar);
                      $akj_mingguIIImar = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-15'  AND '$thn-03-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIImar = db2_fetch_assoc($akj_mingguIIImar);
                      $akj_mingguIVmar  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-22'  AND '$thn-03-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVmar  = db2_fetch_assoc($akj_mingguIVmar);
                  ?>
                  <tr class="row28">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row29">
                      <td class="column0 style4 s">MAR</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguImar['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguImar['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MAR</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                      
                  </tr>
                  <tr class="row30">
                      <td class="column0 style4 s">MAR</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIImar['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIImar['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MAR</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                      
                  </tr>
                  <tr class="row31">
                      <td class="column0 style4 s">MAR</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIImar['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIImar['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MAR</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                      
                  </tr>
                  <tr class="row32">
                      <td class="column0 style4 s">MAR</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVmar['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVmar['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MAR</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                      
                  </tr>
                  <tr class="row33">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguImar['TOTAL']+$rowdb2_brto_mingguIImar['TOTAL']+$rowdb2_brto_mingguIIImar['TOTAL']+$rowdb2_brto_mingguIVmar['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguImar['TOTAL']+$rowdb2_akj_mingguIImar['TOTAL']+$rowdb2_akj_mingguIIImar['TOTAL']+$rowdb2_akj_mingguIVmar['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                      
                  </tr>
              <!-- APRIL -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIapr   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-04-01' AND '$thn-04-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIapr   = db2_fetch_assoc($brto_mingguIapr);
                      $brto_mingguIIapr  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-04-08' AND '$thn-04-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIapr  = db2_fetch_assoc($brto_mingguIIapr);
                      $brto_mingguIIIapr = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-04-15' AND '$thn-04-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIapr = db2_fetch_assoc($brto_mingguIIIapr);
                      $brto_mingguIVapr  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-04-22' AND '$thn-04-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVapr  = db2_fetch_assoc($brto_mingguIVapr);
                      // AKJ
                      $akj_mingguIapr   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-01'  AND '$thn-04-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIapr   = db2_fetch_assoc($akj_mingguIapr);
                      $akj_mingguIIapr  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-08'  AND '$thn-04-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIapr  = db2_fetch_assoc($akj_mingguIIapr);
                      $akj_mingguIIIapr = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-15'  AND '$thn-04-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIapr = db2_fetch_assoc($akj_mingguIIIapr);
                      $akj_mingguIVapr  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-22'  AND '$thn-04-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVapr  = db2_fetch_assoc($akj_mingguIVapr);
                  ?>
                  <tr class="row35">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row36">
                      <td class="column0 style4 s">APR</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIapr['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIapr['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">APR</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row37">
                      <td class="column0 style4 s">APR</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIapr['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIapr['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">APR</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row38">
                      <td class="column0 style4 s">APR</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIapr['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIapr['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">APR</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row39">
                      <td class="column0 style4 s">APR</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVapr['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVapr['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">APR</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row40">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIapr['TOTAL']+$rowdb2_brto_mingguIIapr['TOTAL']+$rowdb2_brto_mingguIIIapr['TOTAL']+$rowdb2_brto_mingguIVapr['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIapr['TOTAL']+$rowdb2_akj_mingguIIapr['TOTAL']+$rowdb2_akj_mingguIIIapr['TOTAL']+$rowdb2_akj_mingguIVapr['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- MEI -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguImei   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-05-01' AND '$thn-05-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguImei   = db2_fetch_assoc($brto_mingguImei);
                      $brto_mingguIImei  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-05-08' AND '$thn-05-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIImei  = db2_fetch_assoc($brto_mingguIImei);
                      $brto_mingguIIImei = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-05-15' AND '$thn-05-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIImei = db2_fetch_assoc($brto_mingguIIImei);
                      $brto_mingguIVmei  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-05-22' AND '$thn-05-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVmei  = db2_fetch_assoc($brto_mingguIVmei);
                      // AKJ
                      $akj_mingguImei   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-01'  AND '$thn-05-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguImei   = db2_fetch_assoc($akj_mingguImei);
                      $akj_mingguIImei  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-08'  AND '$thn-05-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIImei  = db2_fetch_assoc($akj_mingguIImei);
                      $akj_mingguIIImei = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-15'  AND '$thn-05-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIImei = db2_fetch_assoc($akj_mingguIIImei);
                      $akj_mingguIVmei  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-22'  AND '$thn-05-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVmei  = db2_fetch_assoc($akj_mingguIVmei);
                  ?>
                  <tr class="row42">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row43">
                      <td class="column0 style4 s">MEI</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguImei['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguImei['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MEI</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row44">
                      <td class="column0 style4 s">MEI</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIImei['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIImei['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MEI</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row45">
                      <td class="column0 style4 s">MEI</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIImei['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIImei['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MEI</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row46">
                      <td class="column0 style4 s">MEI</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVmei['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVmei['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">MEI</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row47">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguImei['TOTAL']+$rowdb2_brto_mingguIImei['TOTAL']+$rowdb2_brto_mingguIIImei['TOTAL']+$rowdb2_brto_mingguIVmei['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguImei['TOTAL']+$rowdb2_akj_mingguIImei['TOTAL']+$rowdb2_akj_mingguIIImei['TOTAL']+$rowdb2_akj_mingguIVmei['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- JUNI -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIjun   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-06-01' AND '$thn-06-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIjun   = db2_fetch_assoc($brto_mingguIjun);
                      $brto_mingguIIjun  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-06-08' AND '$thn-06-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIjun  = db2_fetch_assoc($brto_mingguIIjun);
                      $brto_mingguIIIjun = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-06-15' AND '$thn-06-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIjun = db2_fetch_assoc($brto_mingguIIIjun);
                      $brto_mingguIVjun  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-06-22' AND '$thn-06-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVjun  = db2_fetch_assoc($brto_mingguIVjun);
                      // AKJ
                      $akj_mingguIjun   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-01'  AND '$thn-06-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIjun   = db2_fetch_assoc($akj_mingguIjun);
                      $akj_mingguIIjun  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-08'  AND '$thn-06-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIjun  = db2_fetch_assoc($akj_mingguIIjun);
                      $akj_mingguIIIjun = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-15'  AND '$thn-06-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIjun = db2_fetch_assoc($akj_mingguIIIjun);
                      $akj_mingguIVjun  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-22'  AND '$thn-06-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVjun  = db2_fetch_assoc($akj_mingguIVjun);
                ?>
                  <tr class="row49">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                      
                  </tr>
                  <tr class="row50">
                      <td class="column0 style4 s">JUN</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIjun['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIjun['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUN</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row51">
                      <td class="column0 style4 s">JUN</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIjun['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIjun['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUN</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row52">
                      <td class="column0 style4 s">JUN</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIjun['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIjun['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUN</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row53">
                      <td class="column0 style4 s">JUN</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVjun['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVjun['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUN</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row54">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIjun['TOTAL']+$rowdb2_brto_mingguIIjun['TOTAL']+$rowdb2_brto_mingguIIIjun['TOTAL']+$rowdb2_brto_mingguIVjun['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIjun['TOTAL']+$rowdb2_akj_mingguIIjun['TOTAL']+$rowdb2_akj_mingguIIIjun['TOTAL']+$rowdb2_akj_mingguIVjun['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- JULI -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIjul   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-07-01' AND '$thn-07-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIjul   = db2_fetch_assoc($brto_mingguIjul);
                      $brto_mingguIIjul  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-07-08' AND '$thn-07-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIjul  = db2_fetch_assoc($brto_mingguIIjul);
                      $brto_mingguIIIjul = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-07-15' AND '$thn-07-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIjul = db2_fetch_assoc($brto_mingguIIIjul);
                      $brto_mingguIVjul  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-07-22' AND '$thn-07-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVjul  = db2_fetch_assoc($brto_mingguIVjul);
                      // AKJ
                      $akj_mingguIjul   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-01'  AND '$thn-07-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIjul   = db2_fetch_assoc($akj_mingguIjul);
                      $akj_mingguIIjul  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-08'  AND '$thn-07-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIjul  = db2_fetch_assoc($akj_mingguIIjul);
                      $akj_mingguIIIjul = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-15'  AND '$thn-07-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIjul = db2_fetch_assoc($akj_mingguIIIjul);
                      $akj_mingguIVjul  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-22'  AND '$thn-07-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVjul  = db2_fetch_assoc($akj_mingguIVjul);
                  ?>
                  <tr class="row56">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row57">
                      <td class="column0 style4 s">JUL</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIjul['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIjul['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUL</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row58">
                      <td class="column0 style4 s">JUL</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIjul['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIjul['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUL</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row59">
                      <td class="column0 style4 s">JUL</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIjul['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIjul['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUL</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row60">
                      <td class="column0 style4 s">JUL</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVjul['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVjul['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">JUL</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row61">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIjul['TOTAL']+$rowdb2_brto_mingguIIjul['TOTAL']+$rowdb2_brto_mingguIIIjul['TOTAL']+$rowdb2_brto_mingguIVjul['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIjul['TOTAL']+$rowdb2_akj_mingguIIjul['TOTAL']+$rowdb2_akj_mingguIIIjul['TOTAL']+$rowdb2_akj_mingguIVjul['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- AGUSTUS -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIags   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-08-01' AND '$thn-08-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIags   = db2_fetch_assoc($brto_mingguIags);
                      $brto_mingguIIags  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-08-08' AND '$thn-08-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIags  = db2_fetch_assoc($brto_mingguIIags);
                      $brto_mingguIIIags = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-08-15' AND '$thn-08-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIags = db2_fetch_assoc($brto_mingguIIIags);
                      $brto_mingguIVags  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-08-22' AND '$thn-08-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVags  = db2_fetch_assoc($brto_mingguIVags);
                      // AKJ
                      $akj_mingguIags   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-01'  AND '$thn-08-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIags   = db2_fetch_assoc($akj_mingguIags);
                      $akj_mingguIIags  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-08'  AND '$thn-08-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIags  = db2_fetch_assoc($akj_mingguIIags);
                      $akj_mingguIIIags = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-15'  AND '$thn-08-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIags = db2_fetch_assoc($akj_mingguIIIags);
                      $akj_mingguIVags  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-22'  AND '$thn-08-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVags  = db2_fetch_assoc($akj_mingguIVags);
                  ?>
                  <tr class="row63">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row64">
                      <td class="column0 style4 s">AGS</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIags['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIags['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">AGS</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row65">
                      <td class="column0 style4 s">AGS</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIags['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIags['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">AGS</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row66">
                      <td class="column0 style4 s">AGS</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIags['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIags['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">AGS</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row67">
                      <td class="column0 style4 s">AGS</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVags['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVags['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">AGS</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row68">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIags['TOTAL']+$rowdb2_brto_mingguIIags['TOTAL']+$rowdb2_brto_mingguIIIags['TOTAL']+$rowdb2_brto_mingguIVags['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIags['TOTAL']+$rowdb2_akj_mingguIIags['TOTAL']+$rowdb2_akj_mingguIIIags['TOTAL']+$rowdb2_akj_mingguIVags['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- SEPTEMBER -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIsep   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-09-01' AND '$thn-09-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIsep   = db2_fetch_assoc($brto_mingguIsep);
                      $brto_mingguIIsep  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-09-08' AND '$thn-09-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIsep  = db2_fetch_assoc($brto_mingguIIsep);
                      $brto_mingguIIIsep = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-09-15' AND '$thn-09-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIsep = db2_fetch_assoc($brto_mingguIIIsep);
                      $brto_mingguIVsep  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-09-22' AND '$thn-09-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVsep  = db2_fetch_assoc($brto_mingguIVsep);
                      // AKJ
                      $akj_mingguIsep   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-01'  AND '$thn-09-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIsep   = db2_fetch_assoc($akj_mingguIsep);
                      $akj_mingguIIsep  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-08'  AND '$thn-09-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIsep  = db2_fetch_assoc($akj_mingguIIsep);
                      $akj_mingguIIIsep = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-15'  AND '$thn-09-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIsep = db2_fetch_assoc($akj_mingguIIIsep);
                      $akj_mingguIVsep  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-22'  AND '$thn-09-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVsep  = db2_fetch_assoc($akj_mingguIVsep);
                  ?>
                  <tr class="row70">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row71">
                      <td class="column0 style4 s">SEPT</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIsep['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIsep['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">SEPT</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row72">
                      <td class="column0 style4 s">SEPT</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIsep['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIsep['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">SEPT</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row73">
                      <td class="column0 style4 s">SEPT</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIsep['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIsep['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">SEPT</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row74">
                      <td class="column0 style4 s">SEPT</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVsep['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVsep['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">SEPT</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row75">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIsep['TOTAL']+$rowdb2_brto_mingguIIsep['TOTAL']+$rowdb2_brto_mingguIIIsep['TOTAL']+$rowdb2_brto_mingguIVsep['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIsep['TOTAL']+$rowdb2_akj_mingguIIsep['TOTAL']+$rowdb2_akj_mingguIIIsep['TOTAL']+$rowdb2_akj_mingguIVsep['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- OKTOBER -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguIokt   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-10-01' AND '$thn-10-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIokt   = db2_fetch_assoc($brto_mingguIokt);
                      $brto_mingguIIokt  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-10-08' AND '$thn-10-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIokt  = db2_fetch_assoc($brto_mingguIIokt);
                      $brto_mingguIIIokt = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-10-15' AND '$thn-10-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIokt = db2_fetch_assoc($brto_mingguIIIokt);
                      $brto_mingguIVokt  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-10-22' AND '$thn-10-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVokt  = db2_fetch_assoc($brto_mingguIVokt);
                      // AKJ
                      $akj_mingguIokt   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-01'  AND '$thn-10-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIokt   = db2_fetch_assoc($akj_mingguIokt);
                      $akj_mingguIIokt  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-08'  AND '$thn-10-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIokt  = db2_fetch_assoc($akj_mingguIIokt);
                      $akj_mingguIIIokt = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-15'  AND '$thn-10-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIokt = db2_fetch_assoc($akj_mingguIIIokt);
                      $akj_mingguIVokt  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-22'  AND '$thn-10-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVokt  = db2_fetch_assoc($akj_mingguIVokt);
                  ?>
                  <tr class="row77">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row78">
                      <td class="column0 style4 s">OKT</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIokt['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIokt['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">OKT</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                      
                  </tr>
                  <tr class="row79">
                      <td class="column0 style4 s">OKT</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIokt['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIokt['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">OKT</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row80">
                      <td class="column0 style4 s">OKT</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIokt['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIokt['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">OKT</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row81">
                      <td class="column0 style4 s">OKT</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVokt['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVokt['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">OKT</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row82">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIokt['TOTAL']+$rowdb2_brto_mingguIIokt['TOTAL']+$rowdb2_brto_mingguIIIokt['TOTAL']+$rowdb2_brto_mingguIVokt['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIokt['TOTAL']+$rowdb2_akj_mingguIIokt['TOTAL']+$rowdb2_akj_mingguIIIokt['TOTAL']+$rowdb2_akj_mingguIVokt['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- NOVEMBER -->
                  <?php 
                      ini_set("error_reporting", 1);
                      session_start();
                      require_once "koneksi.php";
                      $brto_mingguInov   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-11-01' AND '$thn-11-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguInov   = db2_fetch_assoc($brto_mingguInov);
                      $brto_mingguIInov  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-11-08' AND '$thn-11-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIInov  = db2_fetch_assoc($brto_mingguIInov);
                      $brto_mingguIIInov = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-11-15' AND '$thn-11-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIInov = db2_fetch_assoc($brto_mingguIIInov);
                      $brto_mingguIVnov  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-11-22' AND '$thn-11-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVnov  = db2_fetch_assoc($brto_mingguIVnov);
                      // AKJ
                      $akj_mingguInov   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-11-01'  AND '$thn-11-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguInov   = db2_fetch_assoc($akj_mingguInov);
                      $akj_mingguIInov  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-11-08'  AND '$thn-11-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIInov  = db2_fetch_assoc($akj_mingguIInov);
                      $akj_mingguIIInov = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-11-15'  AND '$thn-11-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIInov = db2_fetch_assoc($akj_mingguIIInov);
                      $akj_mingguIVnov  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-11-22'  AND '$thn-11-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVnov  = db2_fetch_assoc($akj_mingguIVnov);
                  ?>
                  <tr class="row84">
                      <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column3 style2 s">(BRUTO)</td>
                      <td class="column4 style2 s">AKJ</td>
                      <td class="column5 style2 s">SDH CELUP</td>
                      <td class="column6 style3 s">BLM CELUP</td>
                      <td class="column7 style2 s">P' BLM CLP</td>
                      <td class="column8 style2 s">C' BLM CLP</td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                      <td class="column13 style2 s">TK</td>
                      <td class="column14 style2 s">GREIGE READY</td>
                      <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                      <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                  </tr>
                  <tr class="row85">
                      <td class="column0 style4 s">NOV</td>
                      <td class="column1 style4 s">I</td>
                      <td class="column2 style14 s">1 - 7</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguInov['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguInov['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">NOV</td>
                      <td class="column11 style4 s">I</td>
                      <td class="column12 style14 s">1 - 7</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row86">
                      <td class="column0 style4 s">NOV</td>
                      <td class="column1 style4 s">II</td>
                      <td class="column2 style14 s">8 - 14</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIInov['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIInov['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">NOV</td>
                      <td class="column11 style4 s">II</td>
                      <td class="column12 style14 s">8 - 14</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row87">
                      <td class="column0 style4 s">NOV</td>
                      <td class="column1 style4 s">III</td>
                      <td class="column2 style14 s">15 - 21</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIInov['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIInov['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">NOV</td>
                      <td class="column11 style4 s">III</td>
                      <td class="column12 style14 s">15 - 21</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row88">
                      <td class="column0 style4 s">NOV</td>
                      <td class="column1 style4 s">IV</td>
                      <td class="column2 style14 s">22 - 31</td>
                      <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVnov['TOTAL'],0); ?></td>
                      <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVnov['TOTAL'],0); ?></td>
                      <td class="column5 style4 null"></td>
                      <td class="column6 style3 null"></td>
                      <td class="column7 style4 null"></td>
                      <td class="column8 style4 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style4 s">NOV</td>
                      <td class="column11 style4 s">IV</td>
                      <td class="column12 style14 s">22 - 31</td>
                      <td class="column13 style4 null"></td>
                      <td class="column14 style4 null"></td>
                      <td class="column15 style4 null"></td>
                      <td class="column16 style4 null"></td>
                  </tr>
                  <tr class="row89">
                      <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguInov['TOTAL']+$rowdb2_brto_mingguIInov['TOTAL']+$rowdb2_brto_mingguIIInov['TOTAL']+$rowdb2_brto_mingguIVnov['TOTAL'],0); ?></td>
                      <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguInov['TOTAL']+$rowdb2_akj_mingguIInov['TOTAL']+$rowdb2_akj_mingguIIInov['TOTAL']+$rowdb2_akj_mingguIVnov['TOTAL'],0); ?></td>
                      <td class="column5 style2 null"></td>
                      <td class="column6 style2 null"></td>
                      <td class="column7 style2 null"></td>
                      <td class="column8 style2 null"></td>
                      <td class="column9 style16 null"></td>
                      <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                      <td class="column13 style2 null"></td>
                      <td class="column14 style2 null"></td>
                      <td class="column15 style2 null"></td>
                      <td class="column16 style2 null"></td>
                  </tr>
              <!-- DESEMBER -->
                      <?php 
                          ini_set("error_reporting", 1);
                          session_start();
                          require_once "koneksi.php";
                          $brto_mingguIdes   = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-12-01' AND '$thn-12-07' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIdes   = db2_fetch_assoc($brto_mingguIdes);
                          $brto_mingguIIdes  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-12-08' AND '$thn-12-14' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIdes  = db2_fetch_assoc($brto_mingguIIdes);
                          $brto_mingguIIIdes = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-12-15' AND '$thn-12-21' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIIIdes = db2_fetch_assoc($brto_mingguIIIdes);
                          $brto_mingguIVdes  = db2_exec($conn1,"SELECT sum(p.USERPRIMARYQUANTITY) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE s.REQUIREDDUEDATE BETWEEN '$thn-12-22' AND '$thn-12-31' AND p.ITEMTYPEAFICODE IN ('KGF','FKF') AND p.ORIGDLVSALORDLINESALORDCNTCOD IN ('DOMESTIC','EXPORT')", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_brto_mingguIVdes  = db2_fetch_assoc($brto_mingguIVdes);
                          // AKJ
                          $akj_mingguIdes   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-01'  AND '$thn-12-07' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIdes   = db2_fetch_assoc($akj_mingguIdes);
                          $akj_mingguIIdes  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-08'  AND '$thn-12-14' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIdes  = db2_fetch_assoc($akj_mingguIIdes);
                          $akj_mingguIIIdes = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-15'  AND '$thn-12-21' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIIIdes = db2_fetch_assoc($akj_mingguIIIdes);
                          $akj_mingguIVdes  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE LEFT JOIN SALESORDERLINE s2 ON s2.PROJECTCODE = s.CODE LEFT JOIN ADSTORAGE a ON a.UNIQUEID = s2.ABSUNIQUEID WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-22'  AND '$thn-12-31' AND a.VALUESTRING LIKE '%AKJ%'", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_akj_mingguIVdes  = db2_fetch_assoc($akj_mingguIVdes);
                      ?>
                      <tr class="row91">
                          <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                          <td class="column3 style2 s">(BRUTO)</td>
                          <td class="column4 style2 s">AKJ</td>
                          <td class="column5 style2 s">SDH CELUP</td>
                          <td class="column6 style3 s">BLM CELUP</td>
                          <td class="column7 style2 s">P' BLM CLP</td>
                          <td class="column8 style2 s">C' BLM CLP</td>
                          <td class="column9 style16 null"></td>
                          <td class="column10 style6 s style6" colspan="3">DELIVERY</td>
                          <td class="column13 style2 s">TK</td>
                          <td class="column14 style2 s">GREIGE READY</td>
                          <td class="column15 style20 s">SDH PRISET BLM CELUP</td>
                          <td class="column16 style20 s">BELUM PRISET BLM CELUP</td>
                          
                      </tr>
                      <tr class="row92">
                          <td class="column0 style4 s">DES</td>
                          <td class="column1 style4 s">I</td>
                          <td class="column2 style14 s">1 - 7</td>
                          <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIdes['TOTAL'],0); ?></td>
                          <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIdes['TOTAL'],0); ?></td>
                          <td class="column5 style4 null"></td>
                          <td class="column6 style3 null"></td>
                          <td class="column7 style4 null"></td>
                          <td class="column8 style4 null"></td>
                          <td class="column9 style16 null"></td>
                          <td class="column10 style4 s">DES</td>
                          <td class="column11 style4 s">I</td>
                          <td class="column12 style14 s">1 - 7</td>
                          <td class="column13 style4 null"></td>
                          <td class="column14 style4 null"></td>
                          <td class="column15 style4 null"></td>
                          <td class="column16 style4 null"></td>
                          
                      </tr>
                      <tr class="row93">
                          <td class="column0 style4 s">DES</td>
                          <td class="column1 style4 s">II</td>
                          <td class="column2 style14 s">8 - 14</td>
                          <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIdes['TOTAL'],0); ?></td>
                          <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIdes['TOTAL'],0); ?></td>
                          <td class="column5 style4 null"></td>
                          <td class="column6 style3 null"></td>
                          <td class="column7 style4 null"></td>
                          <td class="column8 style4 null"></td>
                          <td class="column9 style16 null"></td>
                          <td class="column10 style4 s">DES</td>
                          <td class="column11 style4 s">II</td>
                          <td class="column12 style14 s">8 - 14</td>
                          <td class="column13 style4 null"></td>
                          <td class="column14 style4 null"></td>
                          <td class="column15 style4 null"></td>
                          <td class="column16 style4 null"></td>
                          
                      </tr>
                      <tr class="row94">
                          <td class="column0 style4 s">DES</td>
                          <td class="column1 style4 s">III</td>
                          <td class="column2 style14 s">15 - 21</td>
                          <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIIIdes['TOTAL'],0); ?></td>
                          <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIIIdes['TOTAL'],0); ?></td>
                          <td class="column5 style4 null"></td>
                          <td class="column6 style3 null"></td>
                          <td class="column7 style4 null"></td>
                          <td class="column8 style4 null"></td>
                          <td class="column9 style16 null"></td>
                          <td class="column10 style4 s">DES</td>
                          <td class="column11 style4 s">III</td>
                          <td class="column12 style14 s">15 - 21</td>
                          <td class="column13 style4 null"></td>
                          <td class="column14 style4 null"></td>
                          <td class="column15 style4 null"></td>
                          <td class="column16 style4 null"></td>
                          
                      </tr>
                      <tr class="row95">
                          <td class="column0 style4 s">DES</td>
                          <td class="column1 style4 s">IV</td>
                          <td class="column2 style14 s">22 - 31</td>
                          <td class="column3 style4 null"><?= number_format($rowdb2_brto_mingguIVdes['TOTAL'],0); ?></td>
                          <td class="column4 style4 null"><?= number_format($rowdb2_akj_mingguIVdes['TOTAL'],0); ?></td>
                          <td class="column5 style4 null"></td>
                          <td class="column6 style3 null"></td>
                          <td class="column7 style4 null"></td>
                          <td class="column8 style4 null"></td>
                          <td class="column9 style16 null"></td>
                          <td class="column10 style4 s">DES</td>
                          <td class="column11 style4 s">IV</td>
                          <td class="column12 style14 s">22 - 31</td>
                          <td class="column13 style4 null"></td>
                          <td class="column14 style4 null"></td>
                          <td class="column15 style4 null"></td>
                          <td class="column16 style4 null"></td>
                      </tr>
                      <tr class="row96">
                          <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                          <td class="column3 style2 null"><?= number_format($rowdb2_brto_mingguIdes['TOTAL']+$rowdb2_brto_mingguIIdes['TOTAL']+$rowdb2_brto_mingguIIIdes['TOTAL']+$rowdb2_brto_mingguIVdes['TOTAL'],0); ?></td>
                          <td class="column4 style2 null"><?= number_format($rowdb2_akj_mingguIdes['TOTAL']+$rowdb2_akj_mingguIIdes['TOTAL']+$rowdb2_akj_mingguIIIdes['TOTAL']+$rowdb2_akj_mingguIVdes['TOTAL'],0); ?></td>
                          <td class="column5 style2 null"></td>
                          <td class="column6 style2 null"></td>
                          <td class="column7 style2 null"></td>
                          <td class="column8 style2 null"></td>
                          <td class="column9 style16 null"></td>
                          <td class="column10 style6 s style6" colspan="3">TOTAL</td>
                          <td class="column13 style2 null"></td>
                          <td class="column14 style2 null"></td>
                          <td class="column15 style2 null"></td>
                          <td class="column16 style2 null"></td>
                      </tr>
          <!-- LAPORAN PERMINGGU -->
          
          <!-- LAPORAN PERMINGGU BOOKING & PRINTING -->
            <!-- JANUARI -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIjan   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-01' AND '$thn-01-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIjan   = db2_fetch_assoc($book_mingguIjan);
                $book_mingguIIjan  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-08' AND '$thn-01-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIjan  = db2_fetch_assoc($book_mingguIIjan);
                $book_mingguIIIjan = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-15' AND '$thn-01-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIjan = db2_fetch_assoc($book_mingguIIIjan);
                $book_mingguIVjan  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-01-22' AND '$thn-01-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVjan  = db2_fetch_assoc($book_mingguIVjan);
              ?> 
              <tr class="row97">
                <td class="column0 style21 s style21" colspan="6">BOOKING</td>
                <td class="column7 style22 s style22" colspan="9">PRINTING</td>
              </tr>
              <tr class="row98">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class="column9 style16 null"></td>
                <td class="column7 style2 s">DELIVERY</td>
                <td class="column8 style6 s style6" colspan="2">UBLIMATION</td>
                <td class="column10 style6 s style6" colspan="3">DIPERSE</td>
                <td class="column13 style2 s">REAKTIF</td>
                <td class="column14 style2 s">PIGMENT</td>
                <td class="column15 style2 s">SDH CELUP</td>
                <td class="column16 style3 s">BELUM CELUP</td>
              </tr>
              <tr class="row99">
                <td class="column0 style4 s">JAN</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIjan['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null"></td>
                <td class="column7 style4 s">JAN</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row100">
                <td class="column0 style4 s">JAN</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIjan['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null"></td>
                <td class="column7 style4 s">FEB</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row101">
                <td class="column0 style4 s">JAN</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIjan['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null"></td>
                <td class="column7 style4 s">MAR</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row102">
                <td class="column0 style4 s">JAN</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVjan['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null"></td>
                <td class="column7 style4 s">APR</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row103">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIjan['TOTAL'] + $rowdb2_book_mingguIIjan['TOTAL'] + $rowdb2_book_mingguIIIjan['TOTAL'] + $rowdb2_book_mingguIVjan['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">MEI</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
            <!-- JANUARI -->
            <!-- FEBRUARI -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIfeb   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-01' AND '$thn-02-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIfeb   = db2_fetch_assoc($book_mingguIfeb);
                $book_mingguIIfeb  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-08' AND '$thn-02-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIfeb  = db2_fetch_assoc($book_mingguIIfeb);
                $book_mingguIIIfeb = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-15' AND '$thn-02-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIfeb = db2_fetch_assoc($book_mingguIIIfeb);
                $book_mingguIVfeb  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-02-22' AND '$thn-02-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVfeb  = db2_fetch_assoc($book_mingguIVfeb);
              ?>
              <tr class="row104">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class="column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JUN</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row105">
                <td class="column0 style4 s">FEB</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIfeb['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JUL</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row106">
                <td class="column0 style4 s">FEB</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIfeb['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">AGS</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row107">
                <td class="column0 style4 s">FEB</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIfeb['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">SEPT</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row108">
                <td class="column0 style4 s">FEB</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVfeb['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">OKT</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row109">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIfeb['TOTAL'] + $rowdb2_book_mingguIIfeb['TOTAL'] + $rowdb2_book_mingguIIIfeb['TOTAL'] + $rowdb2_book_mingguIVfeb['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">NOV</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
            <!-- FEBRUARI -->
            <!-- MARET -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguImar   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-01' AND '$thn-03-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguImar   = db2_fetch_assoc($book_mingguImar);
                $book_mingguIImar  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-08' AND '$thn-03-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIImar  = db2_fetch_assoc($book_mingguIImar);
                $book_mingguIIImar = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-15' AND '$thn-03-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIImar = db2_fetch_assoc($book_mingguIIImar);
                $book_mingguIVmar  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-03-22' AND '$thn-03-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVmar  = db2_fetch_assoc($book_mingguIVmar);
              ?>
              <tr class="row110">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class="column9 style16 null"></td>
                <td class="column7 style4 s">DES</td>
                <td class="column8 style10 null style10" colspan="2"></td>
                <td class="column10 style10 null style10" colspan="3"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row111">
                <td class="column0 style4 s">MAR</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguImar['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null"></td>
                <td class="column7 style2 s">TOTAL</td>
                <td class="column8 style6 null style6" colspan="2"></td>
                <td class="column10 style6 null style6" colspan="3"></td>
                <td class="column13 style2 null"></td>
                <td class="column14 style2 null"></td>
                <td class="column15 style2 null"></td>
                <td class="column16 style3 null"></td>
              </tr>
              <tr class="row112">
                <td class="column0 style4 s">MAR</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIImar['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null"></td>
                <td class="column7 style21 s style21" colspan="10">YARN DYE</td>
              </tr>
              <tr class="row113">
                <td class="column0 style4 s">MAR</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIImar['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style2 s">DELIVERY</td>
                <td class="column8 style6 s style6" colspan="5">TOTAL ORDER</td>
                <td class="column13 style6 s style6" colspan="2">SUDAH CELUP</td>
                <td class="column15 style3 s">BELUM CELUP</td>                  
              </tr>
              <tr class="row114">
                <td class="column0 style4 s">MAR</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVmar['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JAN</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row115">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguImar['TOTAL']+$rowdb2_book_mingguIImar['TOTAL']+$rowdb2_book_mingguIIImar['TOTAL']+$rowdb2_book_mingguIVmar['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">FEB</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
            <!-- MARET -->
            <!-- APRIL -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIapr   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-01' AND '$thn-04-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIapr   = db2_fetch_assoc($book_mingguIapr);
                $book_mingguIIapr  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-08' AND '$thn-04-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIapr  = db2_fetch_assoc($book_mingguIIapr);
                $book_mingguIIIapr = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-15' AND '$thn-04-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIapr = db2_fetch_assoc($book_mingguIIIapr);
                $book_mingguIVapr  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-04-22' AND '$thn-04-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVapr  = db2_fetch_assoc($book_mingguIVapr);
                
              ?>
              <tr class="row116">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">MAR</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row117">
                <td class="column0 style4 s">APR</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIapr['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">APR</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row118">
                <td class="column0 style4 s">APR</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIapr['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">MEI</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row119">
                <td class="column0 style4 s">APR</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIapr['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JUN</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row120">
                <td class="column0 style4 s">APR</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVapr['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JUL</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row121">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIapr['TOTAL']+$rowdb2_book_mingguIIapr['TOTAL']+$rowdb2_book_mingguIIIapr['TOTAL']+$rowdb2_book_mingguIVapr['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">AGS</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
            <!-- APRIL -->
            <!-- MEI -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguImei   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-01' AND '$thn-05-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguImei   = db2_fetch_assoc($book_mingguImei);
                $book_mingguIImei  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-08' AND '$thn-05-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIImei  = db2_fetch_assoc($book_mingguIImei);
                $book_mingguIIImei = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-15' AND '$thn-05-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIImei = db2_fetch_assoc($book_mingguIIImei);
                $book_mingguIVmei  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-05-22' AND '$thn-05-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVmei  = db2_fetch_assoc($book_mingguIVmei);              
              ?>
              <tr class="row122">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">SEPT</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row123">
                <td class="column0 style4 s">MEI</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguImei['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">OKT</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row124">
                <td class="column0 style4 s">MEI</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIImei['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">NOV</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row125">
                <td class="column0 style4 s">MEI</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIImei['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">DES</td>
                <td class="column8 style10 null style10" colspan="5"></td>
                <td class="column13 style10 null style10" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row126">
                <td class="column0 style4 s">MEI</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVmei['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class="column9 style16 null">&nbsp;</td>
                <td class="column7 style2 s">TOTAL</td>
                <td class="column8 style6 null style6" colspan="5"></td>
                <td class="column13 style7 null style9" colspan="2"></td>
                <td class="column15 style3 null"></td>
              </tr>
              <tr class="row127">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguImei['TOTAL']+$rowdb2_book_mingguIImei['TOTAL']+$rowdb2_book_mingguIIImei['TOTAL']+$rowdb2_book_mingguIVmei['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style23 s style23" colspan="9">GANTI KAIN INTERNAL + EXTERNAL + RETUR</td>
              </tr>
            <!-- MEI -->
            <!-- JUNI -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIjun   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-01' AND '$thn-06-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIjun   = db2_fetch_assoc($book_mingguIjun);
                $book_mingguIIjun  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-08' AND '$thn-06-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIjun  = db2_fetch_assoc($book_mingguIIjun);
                $book_mingguIIIjun = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-15' AND '$thn-06-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIjun = db2_fetch_assoc($book_mingguIIIjun);
                $book_mingguIVjun  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-06-22' AND '$thn-06-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVjun  = db2_fetch_assoc($book_mingguIVjun);              
              ?>
              <tr class="row128">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style2 s">BULAN</td>
                <td class="column8 style2 s">INTERNAL</td>
                <td class="column9 style6 s style6" colspan="4">EXTERNAL</td>
                <td class="column13 style24 s">TOTAL IN + EXT</td>
                <td class="column14 style2 s">OPER WARNA</td>
                <td class="column15 style2 s">RETUR</td>
              </tr>
              <tr class="row129">
                <td class="column0 style4 s">JUN</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIjun['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JAN</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row130">
                <td class="column0 style4 s">JUN</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIjun['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">FEB</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row131">
                <td class="column0 style4 s">JUN</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIjun['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">MAR</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row132">
                <td class="column0 style4 s">JUN</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVjun['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">APR</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row133">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIjun['TOTAL']+$rowdb2_book_mingguIIjun['TOTAL']+$rowdb2_book_mingguIIIjun['TOTAL']+$rowdb2_book_mingguIVjun['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">MEI</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
            <!-- JUNI -->
            <!-- JULI -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIjul   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-01' AND '$thn-07-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIjul   = db2_fetch_assoc($book_mingguIjul);
                $book_mingguIIjul  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-08' AND '$thn-07-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIjul  = db2_fetch_assoc($book_mingguIIjul);
                $book_mingguIIIjul = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-15' AND '$thn-07-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIjul = db2_fetch_assoc($book_mingguIIIjul);
                $book_mingguIVjul  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-07-22' AND '$thn-07-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVjul  = db2_fetch_assoc($book_mingguIVjul);
              ?>
              <tr class="row134">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JUN</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row135">
                <td class="column0 style4 s">JUL</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIjul['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">JUL</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row136">
                <td class="column0 style4 s">JUL</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIjul['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">AGS</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row137">
                <td class="column0 style4 s">JUL</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIjul['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">SEPT</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row138">
                <td class="column0 style4 s">JUL</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVjul['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">OKT</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row139">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIjul['TOTAL']+$rowdb2_book_mingguIIjul['TOTAL']+$rowdb2_book_mingguIIIjul['TOTAL']+$rowdb2_book_mingguIVjul['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">NOV</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
            <!-- JULI -->
            <!-- AGUSTUS -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIags   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-01' AND '$thn-08-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIags   = db2_fetch_assoc($book_mingguIags);
                $book_mingguIIags  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-08' AND '$thn-08-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIags  = db2_fetch_assoc($book_mingguIIags);
                $book_mingguIIIags = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-15' AND '$thn-08-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIags = db2_fetch_assoc($book_mingguIIIags);
                $book_mingguIVags  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-08-22' AND '$thn-08-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVags  = db2_fetch_assoc($book_mingguIVags);
              ?>
              <tr class="row140">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 s">DES</td>
                <td class="column8 style4 null"></td>
                <td class="column9 style10 null style10" colspan="4"></td>
                <td class="column13 style4 null"></td>
                <td class="column14 style4 null"></td>
                <td class="column15 style4 null"></td>
              </tr>
              <tr class="row141">
                <td class="column0 style4 s">AGS</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIags['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row142">
                <td class="column0 style4 s">AGS</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIags['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style4 null"></td>
                <td class="column8 style25 s style25" colspan="3">BELUM CELUP</td>
                <td class="column11 style25 s style25" colspan="3">KETERANGAN</td>
                <td class="column14 style5 null"></td>
                <td class="column15 style5 null"></td>
              </tr>
              <tr class="row143">
                <td class="column0 style4 s">AGS</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIags['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style26 s">LOKAL</td>
                <td class="column8 style27 null style29" colspan="3"></td>
                <td class="column11 style27 null style29" colspan="3"></td>
              </tr>
              <tr class="row144">
                <td class="column0 style4 s">AGS</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVags['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style26 s">EXPORT</td>
                <td class="column8 style27 null style29" colspan="3"></td>
                <td class="column11 style27 null style29" colspan="3"></td>
              </tr>
              <tr class="row145">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIags['TOTAL']+$rowdb2_book_mingguIIags['TOTAL']+$rowdb2_book_mingguIIIags['TOTAL']+$rowdb2_book_mingguIVags['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style26 s">BOOKING</td>
                <td class="column8 style27 null style29" colspan="3"></td>
                <td class="column11 style30 null style30" colspan="3"></td>
              </tr>
            <!-- AGUSTUS -->
            <!-- SEPTEMBER -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIsep   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-01' AND '$thn-09-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIsep   = db2_fetch_assoc($book_mingguIsep);
                $book_mingguIIsep  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-08' AND '$thn-09-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIsep  = db2_fetch_assoc($book_mingguIIsep);
                $book_mingguIIIsep = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-15' AND '$thn-09-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIsep = db2_fetch_assoc($book_mingguIIIsep);
                $book_mingguIVsep  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-09-22' AND '$thn-09-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVsep  = db2_fetch_assoc($book_mingguIVsep);
              ?>
              <tr class="row146">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
                <td class=" column9 style16 null">&nbsp;</td>
                <td class="column7 style31 s">TOTAL</td>
                <td class="column8 style32 null style32" colspan="3"></td>
                <td class="column11 style15 null"></td>
                <td class="column12 style15 null"></td>
              </tr>
              <tr class="row147">
                <td class="column0 style4 s">SEPT</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIsep['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row148">
                <td class="column0 style4 s">SEPT</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIsep['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row149">
                <td class="column0 style4 s">SEPT</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIsep['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row150">
                <td class="column0 style4 s">SEPT</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVsep['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row151">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIsep['TOTAL']+$rowdb2_book_mingguIIsep['TOTAL']+$rowdb2_book_mingguIIIsep['TOTAL']+$rowdb2_book_mingguIVsep['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
            <!-- SEPTEMBER -->
            <!-- OKTOBER -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIokt   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-01' AND '$thn-10-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIokt   = db2_fetch_assoc($book_mingguIokt);
                $book_mingguIIokt  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-08' AND '$thn-10-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIokt  = db2_fetch_assoc($book_mingguIIokt);
                $book_mingguIIIokt = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-15' AND '$thn-10-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIokt = db2_fetch_assoc($book_mingguIIIokt);
                $book_mingguIVokt  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-22' AND '$thn-10-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVokt  = db2_fetch_assoc($book_mingguIVokt);
              ?>
              <tr class="row152">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
              </tr>
              <tr class="row153">
                <td class="column0 style4 s">OKT</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIokt['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row154">
                <td class="column0 style4 s">OKT</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIokt['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row155">
                <td class="column0 style4 s">OKT</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIokt['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row156">
                <td class="column0 style4 s">OKT</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVokt['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row157">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIokt['TOTAL']+$rowdb2_book_mingguIIokt['TOTAL']+$rowdb2_book_mingguIIIokt['TOTAL']+$rowdb2_book_mingguIVokt['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
            <!-- OKTOBER -->
            <!-- NOVEMBER -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguInov   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-01' AND '$thn-10-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguInov   = db2_fetch_assoc($book_mingguInov);
                $book_mingguIInov  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-08' AND '$thn-10-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIInov  = db2_fetch_assoc($book_mingguIInov);
                $book_mingguIIInov = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-15' AND '$thn-10-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIInov = db2_fetch_assoc($book_mingguIIInov);
                $book_mingguIVnov  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-10-22' AND '$thn-10-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVnov  = db2_fetch_assoc($book_mingguIVnov);
              ?>
              <tr class="row158">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
              </tr>
              <tr class="row159">
                <td class="column0 style4 s">NOV</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguInov['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row160">
                <td class="column0 style4 s">DEC</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIInov['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row161">
                <td class="column0 style4 s">JAN</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIInov['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row162">
                <td class="column0 style4 s">FEB</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVnov['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row163">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguInov['TOTAL']+$rowdb2_book_mingguIInov['TOTAL']+$rowdb2_book_mingguIIInov['TOTAL']+$rowdb2_book_mingguIVnov['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
            <!-- NOVEMBER -->
            <!-- DESEMBER -->
              <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php";
                $book_mingguIdes   = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-01' AND '$thn-12-07'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIdes   = db2_fetch_assoc($book_mingguIdes);
                $book_mingguIIdes  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-08' AND '$thn-12-14'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIdes  = db2_fetch_assoc($book_mingguIIdes);
                $book_mingguIIIdes = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-15' AND '$thn-12-21'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIIIdes = db2_fetch_assoc($book_mingguIIIdes);
                $book_mingguIVdes  = db2_exec($conn1,"SELECT sum( p.USERPRIMARYQUANTITY ) TOTAL FROM PRODUCTIONDEMAND p LEFT JOIN SALESORDER s ON s.CODE = p.PROJECTCODE WHERE p.ITEMTYPEAFICODE = 'KGF' AND s.REQUIREDDUEDATE BETWEEN '$thn-12-22' AND '$thn-12-31'AND  p.ORIGDLVSALORDLINESALORDCNTCOD = 'OPEN' ", array('cursor'=>DB2_SCROLLABLE)); $rowdb2_book_mingguIVdes  = db2_fetch_assoc($book_mingguIVdes);
              ?>
              <tr class="row164">
                <td class="column0 style6 s style6" colspan="3">DELIVERY</td>
                <td class="column3 style2 s">(BRUTO)</td>
                <td class="column4 style2 s">SDH CELUP</td>
                <td class="column5 style3 s">BLM CELUP</td>
              </tr>
              <tr class="row165">
                <td class="column0 style4 s">DES</td>
                <td class="column1 style4 s">I</td>
                <td class="column2 style14 s">1 - 7</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIdes['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row166">
                <td class="column0 style4 s">DES</td>
                <td class="column1 style4 s">II</td>
                <td class="column2 style14 s">8 - 14</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIdes['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row167">
                <td class="column0 style4 s">DES</td>
                <td class="column1 style4 s">III</td>
                <td class="column2 style14 s">15 - 21</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIIIdes['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row168">
                <td class="column0 style4 s">DES</td>
                <td class="column1 style4 s">IV</td>
                <td class="column2 style14 s">22 - 31</td>
                <td class="column3 style4 null"><?= number_format($rowdb2_book_mingguIVdes['TOTAL'],0); ?></td>
                <td class="column4 style4 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
              <tr class="row169">
                <td class="column0 style6 s style6" colspan="3">TOTAL</td>
                <td class="column3 style2 null"><?= number_format($rowdb2_book_mingguIdes['TOTAL']+$rowdb2_book_mingguIIdes['TOTAL']+$rowdb2_book_mingguIIIdes['TOTAL']+$rowdb2_book_mingguIVdes['TOTAL'],0); ?></td>
                <td class="column4 style2 null"></td>
                <td class="column5 style3 null"></td>
              </tr>
            <!-- DESEMBER -->
          <!-- LAPORAN BOOKING & PRINTING -->
        </tbody>
    </table>
  </body>
</html>