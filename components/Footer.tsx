export function Footer() {
  return (
    <footer className="mt-auto border-t border-slate-200 bg-slate-50">
      <div className="mx-auto max-w-6xl px-4 py-8 text-sm text-slate-500">
        <p>
          <span className="font-semibold text-emerald-700">FreshCart</span> —
          groceries delivered fresh. Built with Next.js &amp; Supabase.
        </p>
        <p className="mt-2">© {new Date().getFullYear()} FreshCart. All rights reserved.</p>
      </div>
    </footer>
  );
}
