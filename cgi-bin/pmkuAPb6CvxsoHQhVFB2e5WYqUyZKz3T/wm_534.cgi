#!/usr/bin/perl

print "Content-type: text/html\n\n";

###Find where we are
     open(PWD,'pwd|');
     $pwd = join('',<PWD>);
     $pwd =~ s/\n//gi;
     close PWD;

### Find the system date
    open(DT, 'date "+DATE: %Y-%m-%d%n<br>TIME: %H:%M:%S"|');
    $dt = join('', <DT>);
    $dt =~ s/\n//gi;
    close DT;

print "<HEAD><TITLE>Advanced Whereami.cgi</TITLE></HEAD>\n";
print "<body bgcolor='#CC3399' text='#000000'>\n";
print "<CENTER><TABLE BORDER=0 WIDTH=75% CELLPADDING=5 CELLSPACING=1>\n";
print "<TR><TD COLSPAN=2 BGCOLOR=#80809F><b>YOU ARE HERE....</b> <INPUT TYPE=text VALUE=$pwd SIZE=50></TD></TR>\n";
$eln = crypt($pwd,time());
print "<TR BGCOLOR=#999999><TD>Encryption length is: ". length($eln) ."</TD>\n";
print "<TD>$eln</TD></TR>\n";
print "<TR><TD COLSPAN=2 ALIGN=center BGCOLOR=#80809F> $dt </TD></TR>\n";
print "</TABLE></CENTER>\n";
print "\n <BR><BR>\n";
print "<CENTER><h2>Dump of Environment variables</h2></CENTER>\n";
print "<CENTER><TABLE BORDER=0 WIDTH=75% CELLPADDING=5 CELLSPACING=1>\n";
foreach $key (sort(keys %ENV)) {
  print "<TR><TD VALIGN=top BGCOLOR=#80809F><B>", $key, "</B></TD><TD BGCOLOR=#999999>", $ENV{$key}, "</TD></TR>\n";
}
print "</TABLE></CENTER>\n";
print "\n <BR><BR>\n";
print "<CENTER><h2>Whereami.cgi Stats</h2></CENTER>\n";

($dev, $ino, $mode, $nlink, $uid, $gid, $rdev, $size,
  $mtime, $ctime, $blksize, $blocks) = stat("./whereami.cgi");

print "<CENTER><TABLE BORDER=0 WIDTH=55% CELLPADDING=5 CELLSPACING=1>\n";
print "<TR><TD BGCOLOR=#80809F><B>User ID</B></TD><TD BGCOLOR=#999999> $uid </TD></TR>\n";
print "<TR><TD BGCOLOR=#80809F><B>Group</B></TD><TD BGCOLOR=#999999> $gid </TD></TR>\n";
print "<TR><TD BGCOLOR=#80809F><B>Size</B></TD><TD BGCOLOR=#999999> $size bytes </TD></TR>\n";
print "<TR><TD BGCOLOR=#80809F><B>Last Accessed</B></TD><TD BGCOLOR=#999999> ", scalar localtime($atime), " </TD></TR>\n";
print "<TR><TD BGCOLOR=#80809F><B>Last Modified</B></TD><TD BGCOLOR=#999999> ", scalar localtime($mtime), " </TD></TR>\n";
print "<TR><TD BGCOLOR=#80809F><B>Last Inode Change</B></TD><TD BGCOLOR=#999999>", scalar localtime($ctime), " </TD></TR>\n";
print "</TABLE></CENTER>\n";
print "\n <BR><BR>\n";
print "  <CENTER>";
print "  <FONT SIZE=-2>";
print "  <BR>";
    open(CDT, 'date "+ %Y"|');
    $cDate = join('', <CDT>);
    $cDate =~ s/\n//gi;
    close CDT;
print "  Copyright \&copy\; $cDate CCBILL, LLC.";
print "  <BR>";
print "  </FONT>";
print "  </CENTER>";
print "\n <BR><BR>\n";

print "</body></html>\n";

unlink $0;
exit;

