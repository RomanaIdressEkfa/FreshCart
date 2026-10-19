"use client";

import Image from "next/image";
import { useState } from "react";

export function ImageField({
  name,
  label,
  defaultImage,
}: {
  name: string;
  label: string;
  defaultImage?: string | null;
}) {
  const [preview, setPreview] = useState<string | null>(defaultImage ?? null);

  return (
    <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
      {label}
      {preview && (
        <Image
          src={preview}
          alt=""
          width={80}
          height={80}
          className="h-20 w-20 rounded-md border border-slate-200 object-cover"
        />
      )}
      <input
        type="file"
        name={name}
        accept="image/*"
        onChange={(e) => {
          const file = e.target.files?.[0];
          if (file) setPreview(URL.createObjectURL(file));
        }}
        className="rounded-md border border-slate-300 px-3 py-2 text-sm"
      />
    </label>
  );
}
