# Portfolio Build Brain — Kushal Ghimire
**Source (Laravel):** `/Users/Project/PersonalPortfolio` — DO NOT MODIFY  
**Target (Next.js):** `/Users/Project/portfolio-next`  
**New Stack:** Next.js 16 · TypeScript · Tailwind v4 · Prisma · PostgreSQL (Neon) · Auth.js v5 · Resend · Cloudinary · Vercel  
**Migration started:** 2026-06-26

---

## HOW TO USE THIS FILE
- Read this file before starting any work session.
- Mark steps: `[ ]` → `[x]` as completed.
- Current focus = first unchecked `[ ]` in the active phase.
- Log every key decision in the DECISIONS LOG.

---

## PHASE 1 — ANALYSIS ✅ COMPLETE
All routes, controllers, models, views, and DB schema documented in the Phase 1 chat report.

**Key findings:**
- 4 tables: `projects`, `messages`, `settings` (single row), `users`
- Image uploads via **Cloudinary** (projects) + local storage (profile photo, resume PDF)
- Contact form: saves to DB + sends email via `Mail` (recipient from `mail.contact_recipient`)
- Admin auth: Laravel Breeze sessions, hidden registration at `/kushal`
- Dark mode: Alpine.js + localStorage (`adm_dark`)
- AOS scroll animations throughout
- About page: broken Bootstrap placeholder — needs rebuild from scratch
- SQL dump has **0 projects, 0 messages** — no data to seed

---

## PHASE 2 — SCAFFOLD ✅ COMPLETE

- [x] 2.1 Scaffold Next.js 16 app (TypeScript, Tailwind v4, ESLint, App Router) at `/Users/Project/portfolio-next`
- [x] 2.2 Install all dependencies (Prisma, Auth.js v5, bcryptjs, Resend, Cloudinary, AOS, next-themes)
- [x] 2.3 Port Tailwind design — globals.css with Figtree font, indigo primary, dark mode class strategy, full admin CSS
- [x] 2.4 Set up Prisma schema (projects, messages, settings, users) → `prisma/schema.prisma`
- [x] 2.5 Set up Auth.js v5 with Credentials provider (bcrypt check) → `auth.ts`
- [x] 2.6 Create `.env.example` with all required keys
- [x] 2.7 Initialize Prisma client singleton → `lib/prisma.ts`
- [x] 2.8 Write seed script → `prisma/seed.ts` (default settings + admin user kushal.upr@gmail.com)

---

## PHASE 3 — PUBLIC PAGES ✅ COMPLETE

- [x] 3.1 Root layout (`app/layout.tsx`) — ThemeProvider, Figtree font, Font Awesome CDN
- [x] 3.2 Navbar component (`components/Navbar.tsx`) — sticky, dark toggle, mobile hamburger, active link
- [x] 3.3 Home page (`app/page.tsx`) — hero from settings + project grid with ProjectCard
- [x] 3.4 Projects index (`app/projects/page.tsx`) — paginated grid, status badges
- [x] 3.5 Project detail (`app/projects/[slug]/page.tsx`) — full detail + related projects grid
- [x] 3.6 Contact page (`app/contact/page.tsx`) — form + Server Action (save to DB + Resend email)
- [x] 3.7 About page (`app/about/page.tsx`) — bio section + skills grid with Font Awesome icons
- [x] 3.8 Resume download (`app/api/resume/route.ts`) — serves `public/resume.pdf` as attachment
- [x] 3.9 Not-found page (`app/not-found.tsx`)
- [x] 3.10 ProjectCard component (`components/ProjectCard.tsx`)
- [x] 3.11 AosInit component (`components/AosInit.tsx`)
- [x] 3.12 ThemeProvider component (`components/ThemeProvider.tsx`)

---

## PHASE 4 — AUTH & ADMIN PANEL ✅ COMPLETE

- [x] 4.1 Auth.js config (`auth.ts`) — Credentials provider, bcrypt verify, JWT strategy
- [x] 4.2 Middleware (`middleware.ts`) — protect `/admin/*` and `/api/admin/*`, redirect to `/login`
- [x] 4.3 Login page (`app/login/page.tsx`) — client form, `signIn("credentials")`, redirect to `/admin`
- [x] 4.4 Hidden register page (`app/kushal/page.tsx`) — inline Server Action creates admin user
- [x] 4.5 Admin layout (`app/admin/layout.tsx`) — `auth()` check + AdminSidebar + admin-main wrapper
- [x] 4.6 Admin dashboard (`app/admin/page.tsx`) — stats grid (projects by status, messages/unread), recent 5 projects table
- [x] 4.7 Projects list (`app/admin/projects/page.tsx`) — paginated card grid with edit/delete
- [x] 4.8 Create project (`app/admin/projects/create/page.tsx`) + `createProject` Server Action (Cloudinary upload)
- [x] 4.9 Edit project (`app/admin/projects/[id]/edit/page.tsx`) + `updateProject` Server Action
- [x] 4.10 Delete project — `deleteProject` Server Action in `actions/projects.ts`
- [x] 4.11 Messages list (`app/admin/messages/page.tsx`) — paginated table, unread badge, blue dot indicator
- [x] 4.12 Message detail (`app/admin/messages/[id]/page.tsx`) — auto mark-read, mark-unread, delete, reply link
- [x] 4.13 Settings page (`app/admin/settings/page.tsx`) — siteName, heroTitle, heroSubtitle, email, social URLs, profile photo (Cloudinary), resume PDF
- [x] 4.14 Backup export (`app/api/admin/backup/export/route.ts`) — JSON download (all or by id)
- [x] 4.15 Backup import (`app/api/admin/backup/import/route.ts`) — JSON parse, skip duplicates, Prisma create
- [x] 4.16 Test mail endpoint (`app/api/admin/test-mail/route.ts`) — Resend test email
- [x] 4.17 Backup/Restore UI (`app/admin/backup/page.tsx`) — export all + individual, import via file upload
- [x] 4.18 AdminSidebar component (`components/admin/AdminSidebar.tsx`) — mobile-friendly, logout form
- [x] 4.19 `next.config.ts` — Cloudinary remote image patterns added
- [x] 4.20 `package.json` — `postinstall: prisma generate` added; `db:seed`, `db:migrate`, `db:push`, `db:studio` scripts

---

## PHASE 5 — CONFIG & DEPLOY

- [ ] 5.1 `README.md` — local dev setup + Vercel + Neon deploy steps
- [ ] 5.2 `CHECKLIST.md` — full verification checklist for every feature
- [ ] 5.3 Verify `prisma/schema.prisma` is production-ready (no issues)
- [ ] 5.4 Connect Neon PostgreSQL: set `DATABASE_URL` and run `npx prisma migrate deploy`
- [ ] 5.5 Deploy to Vercel: set all env vars, confirm build passes
- [ ] 5.6 Run `npm run db:seed` on production to create default settings + admin user
- [ ] 5.7 Upload resume.pdf to `public/` or update via admin settings
- [ ] 5.8 Smoke test all public pages
- [ ] 5.9 Smoke test all admin pages end-to-end

---

## FILE STRUCTURE (Target — `/Users/Project/portfolio-next`)

```
portfolio-next/
├── app/
│   ├── layout.tsx                    ✅ root layout, ThemeProvider, fonts
│   ├── page.tsx                      ✅ home (hero + projects grid)
│   ├── not-found.tsx                 ✅
│   ├── about/page.tsx                ✅
│   ├── contact/page.tsx              ✅
│   ├── projects/
│   │   ├── page.tsx                  ✅ paginated index
│   │   └── [slug]/page.tsx           ✅ detail + related
│   ├── login/page.tsx                ✅
│   ├── kushal/page.tsx               ✅ hidden admin register
│   ├── admin/
│   │   ├── layout.tsx                ✅ auth check + sidebar
│   │   ├── page.tsx                  ✅ dashboard stats
│   │   ├── projects/
│   │   │   ├── page.tsx              ✅
│   │   │   ├── create/page.tsx       ✅
│   │   │   └── [id]/edit/page.tsx    ✅
│   │   ├── messages/
│   │   │   ├── page.tsx              ✅
│   │   │   └── [id]/page.tsx         ✅
│   │   ├── settings/page.tsx         ✅
│   │   └── backup/page.tsx           ✅
│   └── api/
│       ├── resume/route.ts           ✅
│       └── admin/
│           ├── backup/
│           │   ├── export/route.ts   ✅
│           │   └── import/route.ts   ✅
│           └── test-mail/route.ts    ✅
├── components/
│   ├── Navbar.tsx                    ✅
│   ├── ProjectCard.tsx               ✅
│   ├── AosInit.tsx                   ✅
│   ├── ThemeProvider.tsx             ✅
│   └── admin/
│       └── AdminSidebar.tsx          ✅
├── lib/
│   ├── prisma.ts                     ✅
│   └── cloudinary.ts                 ✅
├── actions/
│   ├── contact.ts                    ✅
│   ├── projects.ts                   ✅
│   ├── messages.ts                   ✅
│   └── settings.ts                   ✅
├── prisma/
│   ├── schema.prisma                 ✅
│   └── seed.ts                       ✅
├── public/
│   └── resume.pdf                    ← drop your PDF here
├── middleware.ts                     ✅
├── auth.ts                           ✅
├── next.config.ts                    ✅ Cloudinary remote patterns
├── .env.example                      ✅
└── package.json                      ✅ postinstall + db scripts
```

---

## DATABASE SCHEMA (Prisma — exact parity with Laravel)

### `Project`
| field | type | notes |
|-------|------|-------|
| id | Int @id @default(autoincrement()) | |
| title | String @unique | |
| slug | String @unique | |
| description | String | |
| image | String? | Cloudinary URL |
| link | String? | live demo |
| githubLink | String? | |
| status | String @default("completed") | completed / ongoing / planned |
| createdAt | DateTime @default(now()) | |
| updatedAt | DateTime @updatedAt | |

### `Message`
| field | type | notes |
|-------|------|-------|
| id | Int @id @default(autoincrement()) | |
| name | String | |
| email | String | |
| message | String | |
| readAt | DateTime? | null = unread |
| createdAt | DateTime @default(now()) | |
| updatedAt | DateTime @updatedAt | |

### `Setting`
| field | type | notes |
|-------|------|-------|
| id | Int @id @default(1) | always row 1 |
| siteName | String @default("Kushal.dev") | |
| heroTitle | String @default("Kushal Ghimire") | |
| heroSubtitle | String | |
| email | String | |
| githubUrl | String? | |
| linkedinUrl | String? | |
| resume | String? | filename |
| profilePhoto | String? | Cloudinary URL |
| createdAt | DateTime @default(now()) | |
| updatedAt | DateTime @updatedAt | |

### `User`
| field | type | notes |
|-------|------|-------|
| id | Int @id @default(autoincrement()) | |
| name | String | |
| email | String @unique | |
| password | String | bcrypt hash |
| createdAt | DateTime @default(now()) | |
| updatedAt | DateTime @updatedAt | |

---

## DECISIONS LOG

| Date | Decision | Reason |
|------|----------|--------|
| 2026-06-26 | Migrate to Next.js 16 instead of staying on Laravel | User request: modern full-stack with Vercel + Neon |
| 2026-06-26 | Keep Cloudinary for images | Already in use, same credentials carry over |
| 2026-06-26 | Use Resend for email | Modern API, replaces Laravel Mail |
| 2026-06-26 | Tailwind v4 (CSS-based config) | Installed by create-next-app — use `@import "tailwindcss"` in CSS |
| 2026-06-26 | next-themes for dark mode | Replaces Alpine.js $store.adm dark mode |
| 2026-06-26 | Auth.js v5 Credentials provider | Direct bcrypt check, same pattern as Laravel Breeze |
| 2026-06-26 | Rebuild About page properly | Laravel version is a broken Bootstrap placeholder |
| 2026-06-26 | Admin CSS in globals.css | All .a-card, .a-btn, .stat-card etc. as custom CSS classes — no Tailwind utility conflicts |

---

## RUNTIME FIXES LOG (2026-06-26)

| Fix | What changed | Why |
|-----|-------------|-----|
| Prisma 7 schema | Removed `url = env(DATABASE_URL)` from `datasource db {}` | Prisma 7 no longer allows `url` in schema — use `prisma.config.ts` + pg adapter |
| Prisma 7 adapter | `lib/prisma.ts` now uses `PrismaPg` adapter from `@prisma/adapter-pg` | Required by Prisma 7 for driver-level connections |
| `prisma/seed.ts` | Updated to use `PrismaPg` adapter + `import "dotenv/config"` | seed script runs via tsx outside Next.js, needs adapter + dotenv |
| next-themes removed | Replaced with custom `ThemeProvider` (localStorage + classList) | next-themes v0.4.x injects a `<script>` tag that crashes React 19 in dev mode |
| `Navbar.tsx` | Changed `useTheme` import from `next-themes` → `@/components/ThemeProvider` | Matches custom ThemeProvider API (`theme`, `toggle`) |
| `middleware.ts` → `proxy.ts` | Renamed file | Next.js 16 deprecated `middleware.ts` convention in favour of `proxy.ts` |
| `app/api/auth/[...nextauth]/route.ts` | Created — exports `{ GET, POST }` from `@/auth` handlers | Was missing; without it Auth.js redirects all login attempts to `/api/auth/error` |
| Local DB | PostgreSQL 17 started via `brew services start postgresql@17` | Was installed but not running |
| `.env` DATABASE_URL | Set to `postgresql://kushal@localhost:5432/portfolio` | Placeholder value caused ECONNREFUSED on all DB pages |
| `prisma db push` + seed | Tables created, settings + admin user seeded | First-time DB setup |

---

## CURRENT STATUS

**Active Phase:** 5 — CONFIG & DEPLOY  
**Phases 1–4:** ✅ ALL COMPLETE  
**App:** Running at http://localhost:3000 ✅  
**DB:** Local PostgreSQL 17 (`portfolio` database) ✅  
**Admin login:** kushal.upr@gmail.com / admin123 ✅  

**To resume local dev:**
```bash
brew services start postgresql@17   # start DB if not running
cd /Users/Project/portfolio-next
npm run dev                          # starts at http://localhost:3000
```

**Phase 5 remaining:**
- [ ] 5.1 `README.md` — local setup + Vercel + Neon deploy steps
- [ ] 5.2 `CHECKLIST.md` — full feature verification checklist
- [ ] 5.3 Connect Neon for production (replace DATABASE_URL)
- [ ] 5.4 Deploy to Vercel
