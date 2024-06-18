export default function removeUserFromSessionStorage(): void {
    const userKeys: string[] = [
        'id',
        'name',
        'email',
        'role',
        'created_at',
        'updated_at',
        'email_verified_at',
    ]

    userKeys.forEach((key: string): void => {
        window.sessionStorage.removeItem(`user_${key}`)
    })
}
