#!/bin/bash

USER_ID=${LOCAL_UID:-1000}
GROUP_ID=${LOCAL_GID:-1000}

echo "Starting with UID : $USER_ID, GID: $GROUP_ID"
useradd -u $USER_ID -o -m masato
groupmod -g $GROUP_ID masato
export HOME=/home/masato

exec /usr/sbin/gosu masato bash