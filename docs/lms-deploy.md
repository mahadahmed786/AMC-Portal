# Learning portal install

The portal is [Frappe Learning](https://github.com/frappe/lms) on the Hostinger KVM 2. The Business web hosting plan cannot run it: that plan’s Node.js apps do not provide Python, Redis, Docker, inbound WebSockets, or always-on workers.

## Server

- Plan: KVM 2 (2 vCPU, 8 GB RAM, 100 GB disk)
- OS: Ubuntu 26.04.1 LTS, plain system, no control panel
- Address: `179.197.250.131`
- Hostname: `srv2103493`
- A 2 GB swap file is at `/swapfile` and listed in `/etc/fstab`
- Ports 22, 80, and 443 need to be open in the Hostinger VPS firewall. Port 22 is already open. Open 80 and 443 there as well if the portal is not reachable from outside.

## Install command

Run as root on the VPS:

```bash
wget -O easy-install.py https://raw.githubusercontent.com/frappe/bench/develop/easy-install.py
python3 easy-install.py deploy \
  --project=sidra-lms \
  --sitename=179.197.250.131 \
  --image=ghcr.io/frappe/lms \
  --version=stable \
  --app=lms \
  --no-ssl \
  --http-port=80
```

`--no-ssl` and port 80 are there because there is no domain yet. Let’s Encrypt needs a hostname. When one exists, point an A record at `179.197.250.131` and deploy again with SSL and `--sitename` set to that hostname.

The published image `ghcr.io/frappe/lms:stable` starts Frappe, MariaDB, Redis, and the web process, but its app folder only contains Frappe. Learning also depends on the payments app. On this server those two apps were added inside the backend container, then the container was saved as a local image so every service uses the same code:

- `payments` from branch `version-15` (the branch that matches Frappe 16)
- `lms` from branch `version-16`
- Node and Yarn are on the image at `/home/frappe/.nvm/versions/node/v24.22.1/bin`. They are not on the default `PATH`.
- The Learning frontend is a Vite build. Give Node more memory or the build stops around 2 GB: `NODE_OPTIONS=--max-old-space-size=4096`.
- The installer’s configurator rewrites `sites/apps.txt` from the image’s app folder on every start. The compose file at `/root/sidra-lms-compose.yml` now writes `frappe`, then `payments`, then `lms`. That order matters, because Learning imports payments.
- The running image tag is `sidra-lms:local`. Replacing the containers with the untouched `ghcr.io/frappe/lms:stable` image drops Learning from the web process.

Passwords for MariaDB and the Administrator account stay on the server in `/root/sidra-lms.env`. Do not copy that file into git.

Containers in the `sidra-lms` project: frontend (port 80), backend, websocket, scheduler, queue workers, cron, MariaDB, and two Redis instances.

## After the site answers

These are already set on this portal:

- Website name: Dr. Sidra
- Signup enabled (`disable_signup` off)
- Guests can browse courses
- Job posting off
- Currency AUD
- Eight published courses, each with a “Start here” chapter and an “Introduction” lesson
- One published exam-week batch, self-enrolment on, paid batch off

Course paths:

- `/lms/courses/amc-mcq-all-in-one-preparatory-course`
- `/lms/courses/adult-health-medicine`
- `/lms/courses/surgery`
- `/lms/courses/women-s-health`
- `/lms/courses/mental-health`
- `/lms/courses/population-health-biostatistics-and-ethics`
- `/lms/courses/emergency-medicine`
- `/lms/courses/pediatrics`
- Exam week: `/lms/batches/exam-week-high-yield-sessions`

The same paths are in `theme/dr-sidra/inc/config.php`. Portal home: `http://179.197.250.131/lms`.

Dr. Sidra’s own moderator login is not created here, because her email address is not set yet. Until then, the Administrator account on the server is the operator. Students who use Become a Member register as students.

Signup is on, and a registration is accepted. The portal has no outgoing email account yet, so Frappe cannot send the verification message. Until an email account is added under Settings, Email Account, a new student stays unverified and an administrator has to enable that user before they can sign in. The Jobs link is hidden. Quizzes, batches, and certificates stay in the product.
