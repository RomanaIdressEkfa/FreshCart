"use client";

export function createLocalStore<T>(key: string, defaultValue: T) {
  let state = defaultValue;
  let initialized = false;
  const listeners = new Set<() => void>();

  function init() {
    if (initialized || typeof window === "undefined") return;
    initialized = true;
    try {
      const raw = window.localStorage.getItem(key);
      if (raw) state = JSON.parse(raw) as T;
    } catch {
      // ignore corrupt storage
    }
  }

  function getSnapshot() {
    init();
    return state;
  }

  function getServerSnapshot() {
    return defaultValue;
  }

  function subscribe(listener: () => void) {
    listeners.add(listener);
    return () => listeners.delete(listener);
  }

  function setState(updater: (prev: T) => T) {
    init();
    state = updater(state);
    try {
      window.localStorage.setItem(key, JSON.stringify(state));
    } catch {
      // storage unavailable (private mode, quota) - state just won't persist
    }
    listeners.forEach((listener) => listener());
  }

  return { getSnapshot, getServerSnapshot, subscribe, setState };
}
