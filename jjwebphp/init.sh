#!/bin/bash
set -e

echo "Starting SSH ..."
service ssh start

echo "Starting webserver ..."
apache2-foreground