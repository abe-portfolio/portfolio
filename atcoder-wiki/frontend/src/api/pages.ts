import type { Page } from "../types/page"


const BASE_URL = "http://localhost:8080"

export async function createPage(data: {
  title: string
  content_md: string
  tags: string[]
}): Promise<Page> {
  const res = await fetch(`${BASE_URL}/api/pages`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })

  if (!res.ok) {
    throw new Error("failed to create page")
  }

  return res.json()
}

export async function fetchPages(): Promise<Page[]> {
    const res = await fetch(`${BASE_URL}/api/pages`)
  
    if (!res.ok) {
      throw new Error("failed to fetch pages")
    }
  
    return res.json()
  }
