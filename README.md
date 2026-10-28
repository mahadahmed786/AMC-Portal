# Dr. Sidra AMC portal

Public site and student portal for Dr. Sidra’s AMC MCQ Part 1 academy. International medical graduates read about the courses here, then sign up and study in the learning portal.

## The two parts

| Part | Where it runs | What it is |
| --- | --- | --- |
| Public site | Hostinger Business plan, [skyblue-barracuda-988834.hostingersite.com](https://skyblue-barracuda-988834.hostingersite.com/) | WordPress theme in `theme/dr-sidra` |
| Learning portal | Hostinger KVM 2, Ubuntu 26.04, `http://179.197.250.131` | [Frappe Learning](https://github.com/frappe/lms) in Docker |

WordPress does not store student passwords and does not take card payments. **Member Login**, **Become a Member**, and **My Subscribed Courses** open the learning portal:

- Member Login → `http://179.197.250.131/login?redirect-to=/lms`
- Become a Member → `http://179.197.250.131/login` (signup stays on)
- My Subscribed Courses → `http://179.197.250.131/lms`

There is no domain on the portal yet, so it is served over HTTP on the VPS address. When a domain exists, point its A record at `179.197.250.131` and turn HTTPS on. Until then, keep the links in the theme pointed at that address.

## What is in this repo

- `theme/dr-sidra` — the WordPress theme (home, courses, contact, terms, privacy).
- `theme/dr-sidra/inc/config.php` — course titles, blurbs, and the portal path for each card. This is the file to edit when Dr. Sidra’s real list, email, or WhatsApp arrives.
- `docs/lms-deploy.md` — how the learning portal was installed.
- `docker-compose.yml` — optional local WordPress if Docker is installed. The copy used for review on this machine was PHP’s built-in server plus the SQLite plugin, because Docker was not installed locally.

## What is not in this repo

The Frappe application is not vendored. The VPS started from the upstream image `ghcr.io/frappe/lms` and now runs a local image, `sidra-lms:local`, because that published image did not include the Learning package. Passwords for the VPS, MariaDB, and the portal Administrator account stay only on the server, in `/root/sidra-lms.env`. Do not commit that file.

## Edit the catalog

Open `theme/dr-sidra/inc/config.php`.

- `dr_sidra_lms_base()` is the portal address. Login, signup, and My Courses are built from it.
- `dr_sidra_courses()` is the list shown on the home page and the All Courses page. Set `lms_path` to the portal path for that course, for example `/lms/courses/adult-health-medicine`.
- `dr_sidra_contact()` holds email, WhatsApp, Telegram, and Instagram. Leave a value as an empty string until you have the real one. The theme then shows “to be added” instead of inventing an address.

After editing, upload the theme again on the Business hosting site, or reload it if you are previewing locally.

## Preview the theme locally

With PHP 8.3 and the WordPress SQLite plugin:

```bash
# from a WordPress directory that uses this theme
php -S 127.0.0.1:8088 router.php
```

`router.php` sends non-file requests to `index.php` so pretty permalinks work. Activating the theme creates the Courses, Contact, Terms, and Privacy pages and sets Home as the front page.

With Docker, from this folder:

```bash
docker compose up -d
```

WordPress is published on port 8088. Activate the theme `dr-sidra` inside that container. The theme directory is mounted from `theme/dr-sidra`.

## Learning portal

Install notes, including the `easy-install.py` command, are in [docs/lms-deploy.md](docs/lms-deploy.md). Students use the portal for courses, the exam-week batch, quizzes, and certificates. Prices stay off until real AUD amounts and a payment gateway are set inside Frappe.
