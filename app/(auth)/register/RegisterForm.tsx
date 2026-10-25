"use client";

import { useActionState } from "react";
import Link from "next/link";
import { register, type RegisterState } from "./actions";

const initialState: RegisterState = { error: null };

export function RegisterForm() {
  const [state, formAction, pending] = useActionState(register, initialState);

  if (state.confirmEmail) {
    return (
      <p className="text-sm text-gray-600">
        Almost there! Check your email to confirm your account, then{" "}
        <Link href="/login" className="text-indigo-600 underline hover:text-indigo-900">
          sign in
        </Link>
        .
      </p>
    );
  }

  return (
    <form action={formAction}>
      <div>
        <label htmlFor="name" className="block text-sm font-medium text-gray-700">
          Name
        </label>
        <input
          id="name"
          name="name"
          required
          autoFocus
          className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>

      <div className="mt-4">
        <label htmlFor="email" className="block text-sm font-medium text-gray-700">
          Email
        </label>
        <input
          id="email"
          name="email"
          type="email"
          required
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
          minLength={6}
          className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>

      {state.error && <p className="mt-3 text-sm text-red-600">{state.error}</p>}

      <div className="mt-4 flex items-center justify-end">
        <Link href="/login" className="text-sm text-gray-600 underline hover:text-gray-900">
          Already registered?
        </Link>
        <button
          type="submit"
          disabled={pending}
          className="ms-4 inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700 disabled:opacity-60"
        >
          {pending ? "Creating…" : "Register"}
        </button>
      </div>
    </form>
  );
}
