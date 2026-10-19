"use client";

import { useActionState } from "react";
import Link from "next/link";
import { register, type RegisterState } from "./actions";

const initialState: RegisterState = { error: null };

export function RegisterForm() {
  const [state, formAction, pending] = useActionState(register, initialState);

  if (state.confirmEmail) {
    return (
      <p className="text-center text-sm text-slate-600">
        Almost there! Check your email to confirm your account, then{" "}
        <Link href="/login" className="text-emerald-600 hover:underline">
          sign in
        </Link>
        .
      </p>
    );
  }

  return (
    <form action={formAction} className="flex flex-col gap-3">
      <input
        name="name"
        required
        placeholder="Full name"
        className="rounded-md border border-slate-300 px-3 py-2 text-sm"
      />
      <input
        name="email"
        type="email"
        required
        placeholder="Email"
        className="rounded-md border border-slate-300 px-3 py-2 text-sm"
      />
      <input
        name="password"
        type="password"
        required
        minLength={6}
        placeholder="Password"
        className="rounded-md border border-slate-300 px-3 py-2 text-sm"
      />
      {state.error && <p className="text-sm text-red-600">{state.error}</p>}
      <button
        type="submit"
        disabled={pending}
        className="rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700 disabled:opacity-60"
      >
        {pending ? "Creating account…" : "Create account"}
      </button>
      <p className="text-center text-sm text-slate-500">
        Already have an account?{" "}
        <Link href="/login" className="text-emerald-600 hover:underline">
          Sign in
        </Link>
      </p>
    </form>
  );
}
