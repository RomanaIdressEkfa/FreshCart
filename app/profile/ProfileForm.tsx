"use client";

import { useActionState } from "react";
import { updateProfile, type ProfileState } from "./actions";

const initialState: ProfileState = { error: null, success: false };

export function ProfileForm({
  fullName,
  email,
}: {
  fullName: string;
  email: string;
}) {
  const [state, formAction, pending] = useActionState(updateProfile, initialState);

  return (
    <form action={formAction} className="flex flex-col gap-3">
      <label className="text-sm font-medium text-slate-700">
        Full name
        <input
          name="full_name"
          defaultValue={fullName}
          className="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="text-sm font-medium text-slate-700">
        Email
        <input
          name="email"
          type="email"
          defaultValue={email}
          className="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="text-sm font-medium text-slate-700">
        New password (leave blank to keep current)
        <input
          name="password"
          type="password"
          minLength={6}
          className="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      {state.error && <p className="text-sm text-red-600">{state.error}</p>}
      {state.success && <p className="text-sm text-emerald-600">Profile updated.</p>}
      <button
        type="submit"
        disabled={pending}
        className="mt-2 rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700 disabled:opacity-60"
      >
        {pending ? "Saving…" : "Save changes"}
      </button>
    </form>
  );
}
