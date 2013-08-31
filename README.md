= Installation =
== Nginx ==
 location / {
   rewrite ^/(downloads|about)$    /?p=$1 break;
 }

