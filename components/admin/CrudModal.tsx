export function CrudModal({
  id,
  title,
  action,
  children,
  submitLabel,
}: {
  id: string;
  title: string;
  action: (formData: FormData) => void | Promise<void>;
  children: React.ReactNode;
  submitLabel: string;
}) {
  return (
    <div
      id={id}
      tabIndex={-1}
      aria-hidden="true"
      className="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
      <div className="relative p-4 w-full max-w-md max-h-full" style={{ maxWidth: "35rem" }}>
        <div className="relative bg-white rounded-lg shadow">
          <div className="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 className="text-lg font-semibold text-gray-900">{title}</h3>
            <button
              type="button"
              className="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
              data-modal-toggle={id}
            >
              <svg className="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path
                  stroke="currentColor"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                />
              </svg>
              <span className="sr-only">Close modal</span>
            </button>
          </div>
          <form action={action} encType="multipart/form-data" className="p-4 md:p-5">
            {children}
            <button
              type="submit"
              className="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
              {submitLabel}
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}

export function ModalTriggerButton({ target, label }: { target: string; label: string }) {
  return (
    <button
      data-modal-target={target}
      data-modal-toggle={target}
      className="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center"
      type="button"
    >
      {label}
    </button>
  );
}

export function ModalEditButton({ target }: { target: string }) {
  return (
    <button
      data-modal-target={target}
      data-modal-toggle={target}
      type="button"
      className="btn btn-primary btn-sm text-white"
    >
      Edit
    </button>
  );
}
