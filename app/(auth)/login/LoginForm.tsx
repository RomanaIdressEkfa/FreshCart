"use client";

import { useActionState } from "react";
import Link from "next/link";
import { login, type AuthState } from "./actions";

const initialState: AuthState = { error: null };

export function LoginForm({ next }: { next: string }) {
  const [state, formAction, pending] = useActionState(login, initialState);

  return (
    <form action={formAction}>
      <input type="hidden" name="next" value={next} />

      <div>
        <label htmlFor="email" className="block text-sm font-medium text-gray-700">
          Email
        </label>
        <input
          id="email"
          name="email"
          type="email"
          required
          autoFocus
          className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>

      <div className="mt-4">
        <label htmlFor="password" className="block text-sm font-medium text-gray-700">
          Password
        </label>
        <input
          id="password"
          name="password"
          type="password"
          required
          className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>

      {state.error && <p className="mt-3 text-sm text-red-600">{state.error}</p>}

      <div className="mt-4 flex items-center justify-between">
        <Link href="/register" className="text-sm text-gray-600 underline hover:text-gray-900">
          Need an account?
        </Link>
        <button
          type="submit"
          disabled={pending}
          className="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700 disabled:opacity-60"
        >
          {pending ? "Signing in…" : "Log in"}
        </button>
      </div>
    </form>
  );
}
