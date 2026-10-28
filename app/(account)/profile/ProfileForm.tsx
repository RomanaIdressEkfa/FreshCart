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
    <form action={formAction} className="flex flex-col gap-4">
      <div>
        <label className="block text-sm font-medium text-gray-700">Full name</label>
        <input
          name="full_name"
          defaultValue={fullName}
          className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>
      <div>
        <label className="block text-sm font-medium text-gray-700">Email</label>
        <input
          name="email"
          type="email"
          defaultValue={email}
          className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>
      <div>
        <label className="block text-sm font-medium text-gray-700">
          New password (leave blank to keep current)
        </label>
        <input
          name="password"
          type="password"
          minLength={6}
          className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>
      {state.error && <p className="text-sm text-red-600">{state.error}</p>}
      {state.success && <p className="text-sm text-green-600">Profile updated.</p>}
      <button
        type="submit"
        disabled={pending}
        className="inline-flex w-fit items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700 disabled:opacity-60"
      >
        {pending ? "Saving…" : "Save"}
      </button>
    </form>
  );
}
