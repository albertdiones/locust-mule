#!/usr/bin/env bash
# Run continously, put this in crontab with flock
# e.g. * * * * * flock -n /var/run/locust-mule-run.lockfile -c /var/git/locust-mule:master/scripts/run.sh

while [ True ]
do
   FREE_MEMORY=$( echo $(grep "MemFree:" /proc/meminfo |  awk '{print $2}') + $(grep "Inactive:" /proc/meminfo |  awk '{print $2}') | bc )
   TOTAL_MEMORY=$(grep MemTotal /proc/meminfo |  awk '{print $2}')
   ALLOWANCE_MEMORY=$(printf "%.0f" $(echo "$TOTAL_MEMORY * 0.05" | bc))
   if [ $FREE_MEMORY -gt $ALLOWANCE_MEMORY ]
   then
      php -f ../www/run.php
   else
      echo '.'
   fi
   sleep 3
done
